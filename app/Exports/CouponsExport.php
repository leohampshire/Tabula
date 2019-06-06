<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use App\Coupon;
class CouponsExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $companies;

    public function __construct($companies)
    {
        $this->companies = $companies->toArray();
        
    }   
    public function array():array
    {
        
        $export = [];
        foreach ($this->companies as $company) {

            
    		$excel['COD CUPOM'] 		= $company['cod_coupon'];
    		$excel['TIPO '] 	= $company['type_coupon'];
            $excel['TIPO DESCONTO'] 	= $company['type_discount'];
            $excel['VALOR'] 		= $company['value_coupon'];
            $excel['DESCRICAO'] 	= $company['desc_coupon'];
            $excel['TIPO'] 	= $company['type_id'];
            $excel['LIMITE'] 	= $company['limit'];
    		$export[] 			= $excel;
    	}
    	return [
    		$export
        ];
    }

    public function headings():array
    {
        return [
            ['COD CUPOM', 'TIPO', 'TIPO DESCONTO', 'VALOR', 'DESCRICAO', 'TIPO', 'LIMITE']
        ];
    }
}

