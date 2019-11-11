<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{CourseUser, Transaction, Order, OrderItem, Databank, Admin, User, Taxa, Notification};
use Auth;

class TransactionController extends Controller
{
    public function getRecipient(Request $request)
    {
        $auth = Auth::guard('user')->user();
        $request->validate([
            'bank_code'         => 'required',
            'agencia'           => 'required',
            'conta'             => 'required',
            'conta_dv'          => 'required',
            'cpfcnpj'           => 'required',
            'legal_name'        => 'required|max:200',
        ]);

        $payload = ([
          'api_key'         => config('services.pagarme.api_key'),
          'bank_code'       => $request->bank_code,
          'agencia'         => $request->agencia,
          'agencia_dv'      => $request->agencia_dv,
          'conta'           => $request->conta,
          'conta_dv'        => $request->conta_dv,
          'document_number' => $request->cpfcnpj,
          'legal_name'      => $request->legal_name,
      ]);

        $payload = json_encode($payload);
        $ch = curl_init('https://api.pagar.me/1/bank_accounts');

        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        # Return response instead of printing.
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        # Send request.
        $result = curl_exec($ch);
        curl_close($ch);
        # Print response.
        $result = json_decode($result);
        if(isset($result->errors))
        {
            return redirect()->back()->with('warning', "Tivemos um problema técnico, pedimos para que entre em contato com um de nossos administradores. {$result->errors[0]->type}");
        }
        $account_id = $result->id;
        $payload = ([
          'api_key'         => config('services.pagarme.api_key'),
          'bank_account_id' => $result->id, 
          'anticipatable_volume_percentage' => '100', 
          'transfer_enabled' => 'false',
          'legal_name'      => $request->legal_name,
      ]);
        $payload = json_encode($payload);
        $ch = curl_init('https://api.pagar.me/1/recipients');

        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        # Return response instead of printing.
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        # Send request.
        $result = curl_exec($ch);
        curl_close($ch);
        # Print response.
        $result = json_decode($result);
        $data_bank = new Databank;
        $data_bank->account_id      = $account_id;
        $data_bank->bank_code       = $request->bank_code;
        $data_bank->legal_name       = $request->legal_name;
        $data_bank->agencia         = $request->agencia;
        $data_bank->agencia_dv      = $request->agencia_dv;
        $data_bank->conta           = $request->conta;
        $data_bank->conta_dv        = $request->conta_dv;
        $data_bank->document_number = $request->cpfcnpj;
        $data_bank->recipient_id    = $result->id;
        $data_bank->user_id         = $auth->id;
        $data_bank->save();
        if($auth->courses->count() > 0){
            foreach ($auth->courses as $course) {
                $course->avaliable = 2;
                $course->save();
            }
        }

        return redirect()->back()->with('success', 'Dados Bancários salvos com sucesso');
    }

    public function rescuePagarMe(Request $request)
    {
        $auth = Auth::guard('user')->user();


        $rescue = ([
            'amount' => $request->value,
            'recipient_id' => $auth->databank->account_id,
        ]);
    }

    public function pagarme(Request $request)
    {
    	$auth = Auth::guard('user')->user();
        if(!$auth){
            return redirect(route('login'));
        }
        $id = $auth->id;
        $amount = number_format(($auth->cart->sum('price') - $auth->discount), 2, '','');
        $items = [];
        $taxa = Taxa::first();
        $idUsers = array_unique($auth->cart()->where('course_type', 2)->pluck('user_id_owner')->toArray());
        $idAdmins = array_unique($auth->cart()->where('course_type', 1)->pluck('user_id_owner')->toArray());

        foreach ($auth->cart as $key => $cart) {
            $item[$key] = ([
                'id' => strval($cart->id),
                'title'=> $cart->name,
                'unit_price' => number_format($cart->price, 2, '', ''),
                'quantity' => 1,
                'tangible' => false,
                
            ]);
        }
        if (!count($idUsers)) {
            $split_rules[0] = ([
              'amount' => $amount - $this->discount(),
              'recipient_id' => config('services.pagarme.recipient_id'),
              'charge_processing_fee' => true,
              'liable' => true
          ]);
        }elseif (!count($idAdmins)) {
            foreach ($idUsers as $key => $idUser) {
                foreach ($auth->cart as $cart) {
                    $discount = $cart->pivot->where('teacher_id', $idUser)->where('type', 1)->sum('discount');
                }
                $databank = Databank::where('user_id', $idUser)->first();
                $money = number_format(($auth->cart->where('user_id_owner', $idUser)->sum('price') - $discount) * ($taxa->taxa_users/100),2,'','');
                $split_rules[$key] = ([
                  'amount' => $money,
                  'recipient_id' => $databank->recipient_id,
                  'charge_processing_fee' => true,
                  'liable' => true
              ]);
            }
            $tmp = count($split_rules);
            $money = number_format(($auth->cart->where('user_id_owner', $idUser)->sum('price') - $discount) * ($taxa->taxa_tabula/100),2,'','');
            $split_rules[$tmp] = ([
              'amount' => $money,
              'recipient_id' => config('services.pagarme.recipient_id'),
              'charge_processing_fee' => true,
              'liable' => true,
              'charge_remainder' => true
          ]);
        }else{
            foreach ($idUsers as $key => $idUser) {
                foreach ($auth->cart as $cart) {
                    $discount = $cart->pivot->where('teacher_id', $idUser)->where('type', 1)->sum('discount');
                }
                $databank = Databank::where('user_id', $idUser)->first();
                $money = number_format(($auth->cart->where('user_id_owner', $idUser)->where('course_type', 2)->sum('price') - $discount) * ($taxa->taxa_users/100),2,'','');
                $split_rules[$key] = ([
                  'amount' => $money,
                  'recipient_id' => $databank->recipient_id,
                  'charge_processing_fee' => true,
                  'liable' => true
              ]);
            }
            $tmp = count($split_rules);
            foreach ($idAdmins as $key => $idAdmin) {
                foreach ($auth->cart as $cart) {
                    $discount = $cart->pivot->where('teacher_id', $idAdmin)->where('type', 2)->sum('discount');
                }
                $more = ($auth->cart->where('user_id_owner', $idUser)->where('course_type', 2)->sum('price') - $discount) * ($taxa->taxa_tabula/100);
                $money = number_format($more +($auth->cart->where('user_id_owner', $idAdmin)->where('course_type', 1)->sum('price') - $discount),2,'','');
                $split_rules[$key+ $tmp] = ([
                  'amount' => $money,
                  'recipient_id' => config('services.pagarme.recipient_id'),
                  'charge_processing_fee' => true,
                  'liable' => true
              ]);
            }

        }

        $amount 		= $request->pagarme['amount'];
        $payment_method = $request->pagarme['payment_method'];
    	$name 			= $request->pagarme['customer']['name'];
    	$email 			= $request->pagarme['customer']['email'];
    	$cpfcnpj		= $request->pagarme['customer']['document_number'];
        $ddd 			= $request->pagarme['customer']['phone']['ddd'];
    	$phone 			= $request->pagarme['customer']['phone']['number'];
    	$zipcode 		= $request->pagarme['customer']['address']['zipcode'];
    	$street 		= $request->pagarme['customer']['address']['street'];
    	$street_number 	= $request->pagarme['customer']['address']['street_number'];
    	$complementary 	= $request->pagarme['customer']['address']['complementary'];
    	$neighborhood 	= $request->pagarme['customer']['address']['neighborhood'];
    	$city 			= $request->pagarme['customer']['address']['city'];
    	$state 			= $request->pagarme['customer']['address']['state'];

    	$ch = curl_init('https://api.pagar.me/1/transactions');

    	if ($payment_method == 'credit_card') {
    		$card_hash = $request->pagarme['card_hash'];

    		$payload = ([
    			'api_key' => config('services.pagarme.api_key'),
    		  	'amount' => $amount,
    		  	'payment_method' => $payment_method,
    		  	'card_hash' => $card_hash,
    		  	'postback_url' => 'https://www.tabula.com.br/transaction/callback',
    		  	'customer' => [
    		    	'external_id' => strval($id),
    		    	'name' => $name, 
    		    	'type' => 'individual',
    		    	'country' => 'br',
    		    	'documents' => [
    		      	[
    		      	  	'type' => 'cpf',
    		      	  	'number' => $cpfcnpj,
    		      	]
                   
		    	],
                     

	    		    'phone_numbers' => [ "+55{$ddd}{$phone}" ],
	    		    'email' => $email,
    		  	],
    		  	'billing' => [
    		  	  	'name' => $name,
    		  	  	'address' => [
	    		  	    'country' => 'br',
	    		  	    'street' => $street, 
	    		  	    'street_number' => $street_number,
	    		  	    'state' => $state,
	    		  	    'city' => $city,
	    		  	    'neighborhood' => $neighborhood,
	    		  	    'zipcode' => $zipcode
    		  	  	]
    		  	],
    		  	'items' => $item,
                'split_rules' => $split_rules,
    		]);
    	}elseif ($payment_method == 'boleto') {

    		$payload = ([
    			'api_key' => config('services.pagarme.api_key'),
    		  	'amount' => $amount,
    		  	'payment_method' => $payment_method,
    		  	'postback_url' => 'https://www.tabula.com.br/transaction/callback',
    		  	'customer' => [
    		    	'external_id' => '1',
    		    	'name' => $name, 
    		    	'type' => 'individual',
    		    	'country' => 'br',
    		    	'documents' => [
    		      	[
    		      	  	'type' => 'cpf',
    		      	  	'number' => $cpfcnpj,
    		      	],
                    
		    	],
	    		    'phone_numbers' => [ "+55{$ddd}{$phone}" ],
	    		    'email' => $email,
    		  	],
    		  	'billing' => [
    		  	  	'name' => $name,
    		  	  	'address' => [
	    		  	    'country' => 'br',
	    		  	    'street' => $street, 
	    		  	    'street_number' => $street_number,
	    		  	    'state' => $state,
	    		  	    'city' => $city,
	    		  	    'neighborhood' => $neighborhood,
	    		  	    'zipcode' => $zipcode
    		  	  	]
    		  	],
    		  	'items'       => $item,
                'split_rules' => $split_rules,
    		]);
    	}

    	$payload = json_encode($payload);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $name 			= $request->pagarme['customer']['name'];
        $email 			= $request->pagarme['customer']['email'];
        $cpfcnpj		= $request->pagarme['customer']['document_number'];
        $ddd 			= $request->pagarme['customer']['phone']['ddd'];
        $phone 			= $request->pagarme['customer']['phone']['number'];
        $zipcode 		= $request->pagarme['customer']['address']['zipcode'];
        $street 		= $request->pagarme['customer']['address']['street'];
        $street_number 	= $request->pagarme['customer']['address']['street_number'];
        $complementary 	= $request->pagarme['customer']['address']['complementary'];
        $neighborhood 	= $request->pagarme['customer']['address']['neighborhood'];
        $city 			= $request->pagarme['customer']['address']['city'];
        $state 			= $request->pagarme['customer']['address']['state'];

        $ch = curl_init('https://api.pagar.me/1/transactions');

        if ($payment_method == 'credit_card') {
          $card_hash = $request->pagarme['card_hash'];

          $payload = ([
             'api_key' => config('services.pagarme.api_key'),
             'amount' => $amount,
             'payment_method' => $payment_method,
             'card_hash' => $card_hash,
             'postback_url' => 'https://www.tabula.com.br/transaction/callback',
             'customer' => [
                 'external_id' => strval($id),
                 'name' => $name, 
                 'type' => 'individual',
                 'country' => 'br',
                 'documents' => [
                   [
                    'type' => 'cpf',
                    'number' => $cpfcnpj,
                ]
                
            ],
            

            'phone_numbers' => [ "+55{$ddd}{$phone}" ],
            'email' => $email,
        ],
        'billing' => [
            'name' => $name,
            'address' => [
              'country' => 'br',
              'street' => $street, 
              'street_number' => $street_number,
              'state' => $state,
              'city' => $city,
              'neighborhood' => $neighborhood,
              'zipcode' => $zipcode
          ]
      ],
      'items' => $item,
      'split_rules' => $split_rules,
  ]);
      }elseif ($payment_method == 'boleto') {

          $payload = ([
             'api_key' => config('services.pagarme.api_key'),
             'amount' => $amount,
             'payment_method' => $payment_method,
             'postback_url' => 'https://www.tabula.com.br/transaction/callback',
             'customer' => [
                 'external_id' => '1',
                 'name' => $name, 
                 'type' => 'individual',
                 'country' => 'br',
                 'documents' => [
                   [
                    'type' => 'cpf',
                    'number' => $cpfcnpj,
                ],
                
            ],
            'phone_numbers' => [ "+55{$ddd}{$phone}" ],
            'email' => $email,
        ],
        'billing' => [
            'name' => $name,
            'address' => [
              'country' => 'br',
              'street' => $street, 
              'street_number' => $street_number,
              'state' => $state,
              'city' => $city,
              'neighborhood' => $neighborhood,
              'zipcode' => $zipcode
          ]
      ],
      'items'       => $item,
      'split_rules' => $split_rules,
  ]);
      }

      $payload = json_encode($payload);
      curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
      curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		# Return response instead of printing.
      curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		# Send request.
      $result = curl_exec($ch);
      curl_close($ch);
		# Print response.
      $result = json_decode($result);
      if(isset($result->errors))
      {
       return dd($result->errors['0']->message);

       $notification = new Notification;
       $notification->type_notification = "Erro de sistema";
       $notification->desc_notification = "O usuário {$auth->name} teve problemas ao finalizar a compra no sitema";
       $notification->status = 1;
       $notification->save();
       return redirect()->back()->with('warning', 'Tivemos um problema técnico, pedimos para que entre em contato com um de nossos administradores:'.$result->errors['0']->message);
   }
   
   $order = new Order;
   $order->user_id         = $auth->id;
   $order->status 			= $result->status;
   $order->transaction_id 	= $result->id;
   $order->payment_method  = $result->payment_method;
   if(isset($result->boleto_url)){
    $order->boleto_url  = $result->boleto_url;
}
$order->save();

foreach ($auth->cart as $cart) {
    $orderItem = new OrderItem;
    $orderItem->value 		= $cart->price;
    $orderItem->discount 	= $cart->pivot->discount;
    $orderItem->author_id 	= $cart->user_id_owner;
    $orderItem->user_id 	= $cart->pivot->user_id;
    $orderItem->course_id   = $cart->id;
    $orderItem->order_id 	= $order->id;
    $orderItem->type 		= $cart->course_type;
    $orderItem->save();
    
    $notification = new Notification;
    $notification->type_notification = "Compra de Curso";
    $notification->desc_notification = "O aluno {$auth->name} comprou o curso {$cart->name}, do professor {$cart->author->name}";
    $notification->status = 1;
    $notification->save();
    $cart->pivot->delete();
}
if ($result->status == 'paid') {
 return redirect()->route('transaction');
}
return redirect()->back()->with('success', 'Obrigado por comprar no Tabula, estamos aguardando seu pedido ser aprovado, acesse o painel para ter mais detalhes.');

}

public function callback(Request $request)
{
    $boletoUrl = $request->input('transaction.boleto_url');
    $transaction_id = $request->input('transaction.id');
    $current_status = $request->input('current_status');

    $order = Order::where('transaction_id', $transaction_id)->update([
      'status' => $current_status,
      'boleto_url' => $boletoUrl
  ]);
    if ($current_status == 'paid') {
        $this->addCourse($transaction_id);
    }
}

    // Mostra o saldo para o usuário
public function balance()
{
    $auth = Auth::guard('user')->user();
    $recipient_id = $auth->databank->recipient_id;
    $api_key = config('services.pagarme.api_key');
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "https://api.pagar.me/1/recipients/{$recipient_id}/balance?api_key={$api_key}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    $output = curl_exec($ch); 
    curl_close($ch);  
    $result = json_decode($output);
    $amounts = [];
    $amounts['balance']  = number_format($this->insertInPosition($result->available->amount, ','),2,',','.');
    $amounts['transfer'] = number_format($this->insertInPosition($result->transferred->amount, ','),2,',','.');
    $amounts['waiting']  = number_format($this->insertInPosition($result->waiting_funds->amount, ','),2,',','.');

    return view('user.pages.userPanel.balance')->with('amounts', $amounts);  
    
}
    //Realizar saque
public function loot(Request $request)
{
    $request->validate([
        'amount' => 'required',
    ]);
    
    $auth = Auth::guard('user')->user();
    $recipient_id = $auth->databank->recipient_id;
    $amount = str_replace(',', '', str_replace('.', '', $request->amount));

    $payload = ([
      'api_key'         => config('services.pagarme.api_key'),
      'amount'          => $amount,
      'recipient_id'    => $recipient_id,
  ]);
    
    $payload = json_encode($payload);

    $ch = curl_init('https://api.pagar.me/1/transfers');
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        # Return response instead of printing.
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        # Send request.
    $result = curl_exec($ch);
    curl_close($ch);
        # Print response.
    $result = json_decode($result);
    if (isset($result->errors)) {
        return redirect()->back()->with('warning', 'Tivemos um problema com nossos servidores, contacte um Administrador.');
    }
    return redirect(route('user.panel').'#balance')->with('success', 'Saque realizado com sucesso');
}

private function insertInPosition($str, $c)
{
    if ($str == 0 ) {
        return 0.00;
    }
    $str2 = strlen($str)-2;

    if ($str2 == 0) {
        return (int)('0' . $c . substr($str, $str2));
    }
    return (int)(substr($str, 0, $str2) . $c . substr($str, $str2));
}

private function discount()
{
    $total = 0;
    $auth = Auth::guard('user')->user();
    foreach ($auth->cart as  $cart) {
        $discount = $cart->pivot->discount;
        $total = $total + $discount;
    }
    return $total;
}

private function addCourse($transaction)
{  
    $order = Order::where('transaction_id', $transaction)->first();

    $date = date('Y-m-d', strtotime('+6 month')); 
    $carts = $order->items;
    foreach ($carts as $cart) {
        $item = CourseUser::where('user_id',$cart->user_id)->where('course_id', $cart->course_id)->count();
        if($item == 0){
            CourseUser::create([
                'user_id'   => $cart->user_id,
                'course_id' => $cart->course_id,
                'progress'  => 0,
                'expired'   => $date
            ]);
        }
    }
    return redirect()->route('user.panel')->with('success', 'Obrigado por comprar no tabula');
}



}