<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{CourseUser, Transaction};
use Auth;
use PagarMe;

class TransactionController extends Controller
{
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

    public function pagarMe(Request $request)
    {
    	//transforma o total em centavos
		$auth = Auth::guard('user')->user();
		$total = $auth->cart->sum('price') - $auth->discount;
		$total = number_format($total, 2, '', '');
		$items ="";

		foreach ($auth->cart as $cart) {
			$items = '{
		        "id": "PR'.$cart->id.'",
		        "title": "'.$cart->name.'",
		        "unit_price": '.$cart->price.',
		        "quantity": '. 1 .',
		        "tangible": false
	      	},'; 
		}


		$payment_method 	= $request->pagarme['payment_method'];

		$name 				= $request->pagarme['customer']['name'];
		$email 				= $request->pagarme['customer']['email'];
    	$ddd 				= $request->pagarme['customer']['phone']['ddd'];
    	$phone 				= $request->pagarme['customer']['phone']['number'];
		$cpf 				= $request->pagarme['customer']['document_number'];
    	$city 				= $request->pagarme['customer']['address']['city'];
    	$state 				= $request->pagarme['customer']['address']['state'];
    	$street 			= $request->pagarme['customer']['address']['street'];
    	$zipcode 			= $request->pagarme['customer']['address']['zipcode'];
    	$street_number 		= $request->pagarme['customer']['address']['street_number'];
    	$complementary 		= $request->pagarme['customer']['address']['complementary'];
    	$neighborhood 		= $request->pagarme['customer']['address']['neighborhood'];

		if($payment_method == 'credit_card'){

    		$cardHash = $request->pagarme['card_hash'];

    		$ch = curl_init('https://api.pagar.me/1/transactions');
			# Setup request to send json via POST.
			$payload = '{
			    "api_key": "'. env('PAGARME_API_KEY') .'",
			    "amount": '.$total.',
			    "card_hash": "'.$cardHash.'",
			    "postback_url": "https://ivainascer.com.br/transacao/retorno",
			    "customer": {
			      "external_id": "#000000",
			      "name": "'. $name .'",
			      "type": "individual",
			      "country": "br",
			      "email": "'. $email .'",
			      "documents": [
			        {
			          "type": "cpf",
			          "number": "'. $cpf .'"
			        }
			      ],
			      "phone_numbers": ["+55'.$ddd.$phone.'"]
			    },
			    "billing": {
			      "name": "'. $name .'",
			      "address": {
			        "country": "br",
			        "state": "'.$state.'",
			        "city": "'.$city.'",
			        "neighborhood": "'.$neighborhood.'",
			        "street": "'.$street.'",
			        "street_number": "'.$street_number.'",
			        "zipcode": "'.$zipcode.'"
			      }
			    },
			    "items": [
			    	'.$items.'
			    ],
			    "split_rules": [
				    {
				      "recipient_id": "'.$recebedor.'",
				      "percentage": '.$porcentagemRecebedor.',
				      "liable": false,
				      "charge_processing_fee": false
				    },{
				      "recipient_id": "'.env('PAGARME_RECEBEDOR').'",
				      "percentage": '.$porcentagemAdmin.',
				      "liable": true,
				      "charge_processing_fee": true
				    }
				]
			}';
		}
		return dd($capturedTransaction);
		// $transaction = new Transaction;
		// $transaction->acquirer_id 		= $capturedTransaction->acquirer_id;
		// $transaction->amount 			= $capturedTransaction->amount;
		// $transaction->status 			= $capturedTransaction->status;
		// $transaction->payment_method	= $capturedTransaction->payment_method;
		// $transaction->card_id			= $capturedTransaction->card_id;

		
    }

    public function gravar(Request $request)
    {


    	$bebeId = $request->input('bebe');
    	$bebe = Bebe::where('id', $bebeId)->get();
    	$bebeNome = $bebe[0]['nome'];
    	$userId = $bebe[0]['user_id'];
    	$recebedor = User::where('id', $userId)->get();
    	$recebedorEmail = $recebedor[0]['email'];
    	$recebedorNome = $recebedor[0]['name'];
    	$recebedor = $recebedor[0]['pagarme_id'];

    	$taxa = Taxa::get();
        $taxa = $taxa[0]['taxa'];

        $porcentagemRecebedor = 100 - $taxa;
        $porcentagemAdmin = $taxa;

    	$presenteId = $request->input('presenteId');
    	$item = $request->input('presente');
    	$id = $request->input('id');
    	$valor = $request->input('valor');
    	$quantidade = $request->input('quantidade');
    	$amount = $request->pagarme['amount'];
    	$metodo = $request->pagarme['payment_method'];

    	// Dados do convidado
    	$nome = $request->pagarme['customer']['name'];
    	$email = $request->pagarme['customer']['email'];
    	$cpf = $request->pagarme['customer']['document_number'];
    	$ddd = $request->pagarme['customer']['phone']['ddd'];
    	$telefone = $request->pagarme['customer']['phone']['number'];
    	$cep = $request->pagarme['customer']['address']['zipcode'];
    	$rua = $request->pagarme['customer']['address']['street'];
    	$numero = $request->pagarme['customer']['address']['street_number'];
    	$complemento = $request->pagarme['customer']['address']['complementary'];
    	$bairro = $request->pagarme['customer']['address']['neighborhood'];
    	$cidade = $request->pagarme['customer']['address']['city'];
    	$estado = $request->pagarme['customer']['address']['state'];

    	if($metodo == 'credit_card'){

    		$cardHash = $request->pagarme['card_hash'];

    		$ch = curl_init('https://api.pagar.me/1/transactions');
			# Setup request to send json via POST.
			$payload = '{
			    "api_key": "'. env('PAGARME_API_KEY') .'",
			    "amount": '.$amount.',
			    "card_hash": "'.$cardHash.'",
			    "postback_url": "https://ivainascer.com.br/transacao/retorno",
			    "customer": {
			      "external_id": "#000000",
			      "name": "'. $nome .'",
			      "type": "individual",
			      "country": "br",
			      "email": "'. $email .'",
			      "documents": [
			        {
			          "type": "cpf",
			          "number": "'. $cpf .'"
			        }
			      ],
			      "phone_numbers": ["+55'.$ddd.$telefone.'"]
			    },
			    "billing": {
			      "name": "'. $nome .'",
			      "address": {
			        "country": "br",
			        "state": "'.$estado.'",
			        "city": "'.$cidade.'",
			        "neighborhood": "'.$bairro.'",
			        "street": "'.$rua.'",
			        "street_number": "'.$numero.'",
			        "zipcode": "'.$cep.'"
			      }
			    },
			    "shipping": {
			      "name": "Sem frete",
			      "fee": 0,
			      "expedited": true,
			      "address": {
			        "country": "br",
			        "state": "'.$estado.'",
			        "city": "'.$cidade.'",
			        "neighborhood": "'.$bairro.'",
			        "street": "'.$rua.'",
			        "street_number": "'.$numero.'",
			        "zipcode": "'.$cep.'"
			      }
			    },
			    "items": [
			      {
			        "id": "PR'.$id.'",
			        "title": "'.$item.'",
			        "unit_price": '.$valor.',
			        "quantity": '.$quantidade.',
			        "tangible": true
			      }
			    ],
			    "split_rules": [
				    {
				      "recipient_id": "'.$recebedor.'",
				      "percentage": '.$porcentagemRecebedor.',
				      "liable": false,
				      "charge_processing_fee": false
				    },{
				      "recipient_id": "'.env('PAGARME_RECEBEDOR').'",
				      "percentage": '.$porcentagemAdmin.',
				      "liable": true,
				      "charge_processing_fee": true
				    }
				]
			}';

			curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
			curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			# Return response instead of printing.
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			# Send request.
			$result = curl_exec($ch);
			curl_close($ch);
			# Print response.
			$result = json_decode($result);

			if(isset($result->errors)){
				echo $result->errors['0']->message;
			} else {

				$pedido = Pedido::create([
					'bebe_id' => $bebeId,
					'user_id' => $userId,
					'convidado' => $nome,
					'convidado_email' => $email,
					'convidado_telefone' => '(' . $ddd .')' . $telefone,
					'transacao' => $result->id,
					'valor' => $amount,
					'status' => $result->status,
					'presente_id' => $presenteId,
					'presente' => $item,
					'quantidade' => $quantidade,
					'preco' => $valor
				])->id;


				

				return redirect('pedido/finalizado/' . $pedido);
			}
			
    	}

    	if($metodo == 'boleto'){

    		$ch = curl_init('https://api.pagar.me/1/transactions');
			# Setup request to send json via POST.
			$payload = '{
			    "api_key": "'. env('PAGARME_API_KEY') .'",
			    "amount":'. $amount .',
			    "payment_method": "'. $metodo .'",
			    "postback_url": "https://ivainascer.com.br/transacao/retorno",
			    "customer": {
			      "external_id": "#000000",
			      "name": "'. $nome .'",
			      "type": "individual",
			      "country": "br",
			      "email": "'. $email .'",
			      "documents": [
			        {
			          "type": "cpf",
			          "number": "'. $cpf .'"
			        }
			      ],
			      "phone_numbers": ["+55'.$ddd.$telefone.'"]
			    },
			    "billing": {
			      "name": "'. $nome .'",
			      "address": {
			        "country": "br",
			        "state": "'.$estado.'",
			        "city": "'.$cidade.'",
			        "neighborhood": "'.$bairro.'",
			        "street": "'.$rua.'",
			        "street_number": "'.$numero.'",
			        "zipcode": "'.$cep.'"
			      }
			    },
			    "shipping": {
			      "name": "Sem frete",
			      "fee": 0,
			      "expedited": true,
			      "address": {
			        "country": "br",
			        "state": "'.$estado.'",
			        "city": "'.$cidade.'",
			        "neighborhood": "'.$bairro.'",
			        "street": "'.$rua.'",
			        "street_number": "'.$numero.'",
			        "zipcode": "'.$cep.'"
			      }
			    },
			    "items": [
			      {
			        "id": "PR'.$id.'",
			        "title": "'.$item.'",
			        "unit_price": '.$valor.',
			        "quantity": '.$quantidade.',
			        "tangible": true
			      }
			    ],
			    "split_rules": [
				    {
				      "recipient_id": "'.$recebedor.'",
				      "percentage": '.$porcentagemRecebedor.',
				      "liable": false,
				      "charge_processing_fee": false
				    },{
				      "recipient_id": "'.env('PAGARME_RECEBEDOR').'",
				      "percentage": '.$porcentagemAdmin.',
				      "liable": true,
				      "charge_processing_fee": true
				    }
				]
			}';

			curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
			curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			# Return response instead of printing.
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			# Send request.
			$result = curl_exec($ch);
			curl_close($ch);
			# Print response.
			$result = json_decode($result);

			if(isset($result->errors)){
				echo $result->errors['0']->message;
			} else {

				$pedido = Pedido::create([
					'bebe_id' => $bebeId,
					'user_id' => $userId,
					'convidado' => $nome,
					'convidado_email' => $email,
					'convidado_telefone' => '(' . $ddd .')' . $telefone,
					'transacao' => $result->id,
					'valor' => $amount,
					'status' => $result->status,
					'presente_id' => $presenteId,
					'presente' => $item,
					'quantidade' => $quantidade,
					'preco' => $valor,
					'boleto_url' => url('pedido/boleto').'/'.$result->id
				])->id;

				return redirect('pedido/finalizado/' . $pedido);
			}

    	}
    }
}
