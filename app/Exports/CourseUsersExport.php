<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use App\CourseUser;

class CourseUsersExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $cUsers;

    public function __construct($cUsers)
    {
        $this->cUsers = $cUsers->toArray();
        
    }   
    public function array():array
    {
        
        $export = [];
        foreach ($this->cUsers as $cUser) {

            
    		$excel['ALUNO'] 	= $cUser['userName'];
    		$excel['CURSO'] 	= $cUser['courseName'];
            $excel['PROGRESSO']	= $cUser['progress'];
    		$export[] 			= $excel;
    	}
    	return [
    		$export
        ];
    }

    public function headings():array
    {
        return [
            ['ALUNO', 'CURSO', 'PROGRESSO']
        ];
    }
}

