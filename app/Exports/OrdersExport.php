<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use App\Order;

class OrdersExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $orders;

    public function __construct($orders)
    {
        $this->orders = $orders->toArray();
        
    }   
    public function array():array
    {
        
        $export = [];
        foreach ($this->orders as $order) {

            
    		$excel['NOME'] 		= $order['userName'];
    		$excel['STATUS '] 	= $order['status'];
            $excel['PEDIDO'] 	= $order['transaction_id'];
    		$export[] 				= $excel;
    	}
    	return [
    		$export
        ];
    }

    public function headings():array
    {
        return [
            ['NOME', 'STATUS', 'PEDIDO']
        ];
    }
}

