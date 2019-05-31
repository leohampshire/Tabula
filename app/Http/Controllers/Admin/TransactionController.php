<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class TransactionController extends Controller
{
	// Mostra o saldo para o usuário
    public function balance()
    {
    	$api_key = config('services.pagarme.api_key');
    	$recipient_id = config('services.pagarme.recipient_id');
    	$auth = Auth::guard('admin')->user();
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "https://api.pagar.me/1/balance?recipient_id={$recipient_id}&api_key={$api_key}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);  
        $result = json_decode($output);
        $amounts = [];
        $amounts['balance'] 	= number_format($this->insertInPosition($result->available->amount, ','),2,',','.');
        $amounts['transfer'] 	= number_format($this->insertInPosition($result->transferred->amount, ','),2,',','.');
        $amounts['waiting'] 	= number_format($this->insertInPosition($result->waiting_funds->amount, ','),2,',','.');

		return view('admin.pages.balance.balance')->with('amounts', $amounts);	
    	
    }
    //Realizar saque
    public function loot(Request $request)
    {
    	$payload = ([
          'api_key'         => config('services.pagarme.api_key'),
          'amount' 			=> str_replace(',', '', str_replace('.', '', $request->amount)),
          'recipient_id'    => 're_cj2tbe8f103ewt66d6l8tgs37',
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
			return redirect()->back()->with('warning', 'tivemos um problema com nossos servidores, contacte um administrador.');
		}
		return redirect()->back()->with('success', 'Saque realizado com sucesso');
    }

    private function insertInPosition($str, $c){
    	if ($str == 0 ) {
    		return 0.00;
    	}
    	$str2 = strlen($str)-2;

    	if ($str2 == 0) {
    		return (int)('0' . $c . substr($str, $str2));
    	}
    	return (int)(substr($str, 0, $str2) . $c . substr($str, $str2));
	}
}
