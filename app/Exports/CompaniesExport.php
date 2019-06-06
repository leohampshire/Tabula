<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use App\Company;
class CompaniesExport implements FromArray, WithHeadings
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

            
    		$excel['NOME'] 		= $company['name'];
    		$excel['E-MAIL'] 	= $company['email'];
            $excel['BIO'] 		= $company['bio'];
            $excel['WEBSITE'] 	= $company['website'];
            $excel['YOUTUBE'] 	= $company['youtube'];
            $excel['GOOGLE'] 	= $company['google_plus'];
            $excel['LINKEDIN'] 	= $company['linkedin'];
            $excel['TWITTER'] 	= $company['twitter'];
            $excel['FACEBOOK'] 	= $company['facebook'];
            $excel['PAÍS'] 		= $company['countrys'];
            $excel['ESTADO'] 	= $company['states'];
            $excel['SOBRE'] 	= $company['about'];
    		$export[] 			= $excel;
    	}
    	return [
    		$export
        ];
    }

    public function headings():array
    {
        return [
            ['NOME', 'EMAIL', 'BIO', 'WEBSITE', 'YOUTUBE', 'GOOGLE', 'LINKEDIN', 'TWITTER', 'FACEBOOK', 'PAÍS', 'ESTADO', 'SOBRE',]
        ];
    }
}

