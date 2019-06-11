<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use App\Newsletter;
class NewslettersExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $newsletters;

    public function __construct($newsletters)
    {
        $this->newsletters = $newsletters->toArray();
        
    }   
    public function array():array
    {
        
        $export = [];
        foreach ($this->newsletters as $newsletter) {
            
    		$excel['NOME'] 		= $newsletter['name'];
    		$excel['E-MAIL'] 	= $newsletter['email'];
    		$export[] 			= $excel;
    	}
    	return [
    		$export
        ];
    }

    public function headings():array
    {
        return [
            [ 'NOME', 'E-MAIL']
        ];
    }
}
