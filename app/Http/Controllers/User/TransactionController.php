<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{CourseUser, Transaction, Order, OrderItem, Databank, Admin, User, Taxa};
use Auth;

class TransactionController extends Controller
{

    public function getRecipient(Request $request)
    {
        $auth = Auth::guard('user')->user();

        $payload = ([
          'api_key'         => 'ak_test_EHrIO0g0eb60TqcuM2Sc1Tq5JQV5Hi',
          'bank_code'       => $request->bank_code,
          'agencia'         => $request->agencia,
          'agencia_dv'      => $request->agencia_dv,
          'conta'           => $request->conta,
          'conta_dv'        => $request->conta_dv,
          'document_number' => $request->cpf,
          'legal_name'      => $auth->name,
          'postback_url'    => 'https://enlcpucm8t45.x.pipedream.net/',
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
        $account_id = $result->id;
        $payload = ([
          'api_key'         => 'ak_test_EHrIO0g0eb60TqcuM2Sc1Tq5JQV5Hi',
          'bank_account_id' => $result->id, 
          'anticipatable_volume_percentage' => '100', 
          'transfer_enabled' => 'false',
          'postback_url'    => 'https://enlcpucm8t45.x.pipedream.net/',
          'legal_name'      => $auth->name,
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
        $data_bank->agencia         = $request->agencia;
        $data_bank->agencia_dv      = $request->agencia_dv;
        $data_bank->conta           = $request->conta;
        $data_bank->conta_dv        = $request->conta_dv;
        $data_bank->document_number = $request->cpf;
        $data_bank->recipient_id    = $result->id;
        $data_bank->user_id         = $auth->id;
        $data_bank->save();

        return redirect()->back()->with('succes', 'Dados Bancários salvos com sucesso');
    }

    public function statusTransaction(Request $request)
	{  
		$auth = Auth::guard('user')->user();
		foreach ($auth->cart()->get() as $cart) {
			CourseUser::create([
				'user_id' 	=> $auth->id,
				'course_id' => $cart->id,
				'progress'	=> 0,
			]);
			$cart->pivot->delete();

		}
        return redirect()->route('user.panel')->with('success', 'Obrigado por comprar no tabula');

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
    	$amount = number_format(($auth->cart->sum('price') - $auth->discount), 2, '','');
    	$items = [];
        $taxa = Taxa::first();

        $idUsers = $auth->cart()->where('course_type', 2)->pluck('user_id_owner');
        $idAdmin = $auth->cart()->where('course_type', 1)->pluck('user_id_owner');

        if (!count($idUsers)) {
            $split_rules[0] = ([
                [
                  'amount' => $amount- $this->discount(),
                  'recipient_id' => 're_cj2tbe8f103ewt66d6l8tgs37',
                  'charge_processing_fee' => true,
                  'liable' => true
                ],
            ]);
            foreach ($auth->cart as $key => $cart) {

                $item[$key] = ([
                    'id' => $cart->id,
                    'title'=> $cart->name,
                    'unit_price' => number_format($cart->price, 2, '', ''),
                    'quantity' => 1,
                    'tangible' => false,
                ]);
                
            }
        }elseif (!count($idAdmin)) {
            foreach ($idUsers as $key => $idUser) {
                foreach ($auth->cart as $cart) {
                    $discount = $cart->pivot->where('teacher_id', $idUser)->where('type', 1)->sum('discount');
                }

                $split_rules[$key] = ([
                [
                  'amount' => $auth->cart->where('user_id_owner', $idUser)->sum('price') - $discount,
                  'recipient_id' => 're_cj2tbe8f103ewt66d6l8tgs37',
                  'charge_processing_fee' => true,
                  'liable' => true
                ],
            ]);

            }
        }else{
            foreach ($idUsers as $key => $idUser) {
                foreach ($auth->cart as $cart) {
                    $discount = $cart->pivot->where('teacher_id', $idUser)->where('type', 1)->sum('discount');
                }

                $split_rules[$key] = ([
                [
                  'amount' => $auth->cart->where('user_id_owner', $idUser)->sum('price') - $discount,
                  'recipient_id' => 're_cj2tbe8f103ewt66d6l8tgs37',
                  'charge_processing_fee' => true,
                  'liable' => true
                ],
            ]);

            }
        }
    	$amount 		= $request->pagarme['amount'];
    	$payment_method = $request->pagarme['payment_method'];

    	$name 			= $request->pagarme['customer']['name'];
    	$email 			= $request->pagarme['customer']['email'];
    	$cpf 			= $request->pagarme['customer']['document_number'];
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
    			'api_key' => 'ak_test_EHrIO0g0eb60TqcuM2Sc1Tq5JQV5Hi',
    		  	'amount' => $amount,
    		  	'payment_method' => $payment_method,
    		  	'card_hash' => $card_hash,
    		  	'postback_url' => 'http://www.tabula.com.br/transaction/callback',
    		  	'customer' => [
    		    	'external_id' => '1',
    		    	'name' => $name, 
    		    	'type' => 'individual',
    		    	'country' => 'br',
    		    	'documents' => [
    		      	[
    		      	  	'type' => 'cpf',
    		      	  	'number' => $cpf,
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
    			'api_key' => 'ak_test_EHrIO0g0eb60TqcuM2Sc1Tq5JQV5Hi',
    		  	'amount' => $amount,
    		  	'payment_method' => $payment_method,
    		  	'postback_url' => 'http://www.tabula.com.br/transaction/callback',
    		  	'customer' => [
    		    	'external_id' => '1',
    		    	'name' => $name, 
    		    	'type' => 'individual',
    		    	'country' => 'br',
    		    	'documents' => [
    		      	[
    		      	  	'type' => 'cpf',
    		      	  	'number' => $cpf,
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


		$order = new Order;
        $order->user_id         = $auth->id;
		$order->status 			= $result->status;
		$order->transaction_id 	= $result->id;
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
		}
		if ($result->status == 'paid') {
			return redirect()->route('transaction');
		}
		return redirect()->back()->with('success', 'Obrigado por comprar no Tabula, estamos aguardando seu pedido ser aprovado');
		
    }

    public function callback(Request $request)
    {
    	$boletoUrl = $request->input('transaction.boleto_url');

    	Order::where('transaction_id', $request->id)->update([
    		'status' => $request->current_status,
    		'boleto_url' => $boletoUrl
		]);
		if ($request->current_status == 'paid') {
			return redirect()->route('transaction');
		}
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


}
