<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use App\Admin;
class AdminsExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $admins;

    public function __construct($admins)
    {
        $this->admins = $admins->toArray();
        
    }   
    public function array():array
    {
        
        $export = [];
        foreach ($this->admins as $admin) {
            
    		$excel['NOME'] 		   	= $admin['name'];
    		$excel['TIPO USUÁRIO'] 	= $admin['user_type'];
            $excel['EMAIL'] 		= $admin['email'];
    		$export[] 			   	= $excel;
    	}
    	return [
    		$export
        ];
    }

    public function headings():array
    {
        return [
            ['NOME','TIPO USUÁRIO','EMAIL']
        
        ];
    }
}
