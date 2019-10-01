<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use App\User;

class UsersExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $users;

    public function __construct($users)
    {
        $this->users = $users->toArray();
        
    }   
    public function array():array
    {
        
        $export = [];
        foreach ($this->users as $user) {
            
    		$excel['NOME'] 		   			= $user['name'];
            $excel['EMAIL'] 				= $user['email'];
    		$excel['CPF'] 		   			= $user['cpf'];
            $excel['CNPJ']                  = $user['cnpj'];
            $excel['DATA DE ANIVERSÁRIO'] 	= $user['birthdate'];
    		$excel['SEXO'] 		   			= $user['sex'];
            $excel['BIO'] 					= $user['bio'];
    		$excel['WEBSITE'] 		   		= $user['website'];
            $excel['YOUTUBE'] 				= $user['youtube'];
            $excel['GOOGLE'] 				= $user['google_plus'];
            $excel['LINKEDIN'] 				= $user['linkedin'];
            $excel['TWITTER'] 				= $user['twitter'];
            $excel['FACEBOOK'] 				= $user['facebook'];
            $excel['PAIS'] 					= $user['countrys'];
            $excel['ESTADO'] 				= $user['states'];
            $excel['ESCOLARIDADE'] 			= $user['schoolings'];
    		$export[] 			   			= $excel;
    	}
    	return [
    		$export
        ];
    }

    public function headings():array
    {
        return [
            ['NOME', 'EMAIL', 'CPF', 'DATA DE ANIVERSÁRIO', 'SEXO', 'BIO', 'WEBSITE', 'YOUTUBE', 'GOOGLE', 'LINKEDIN', 'TWITTER', 'FACEBOOK', 'PAIS', 'ESTADO', 'ESCOLARIDADE']
        ];
    }
}
