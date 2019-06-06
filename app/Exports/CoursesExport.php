<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use App\Course;

class CoursesExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $courses;

    public function __construct($courses)
    {
        $this->courses = $courses->toArray();
        
    }   
    public function array():array
    {
        
        $export = [];
        foreach ($this->courses as $course) {

            
    		$excel['NOME'] 	= $course['name'];
    		$excel['PREÇO '] 		= $course['price'];
            $excel['DESCRICAO'] = $course['desc'];
            $excel['AUTOR'] 		= $course['user'];
            $excel['CATEGORIA'] 	= $course['categ'];
            $excel['URN'] 			= $course['urn'];
            $excel['REQUISITOS'] 		= $course['requirements'];
            $excel['TOTAL AULAS'] 		= $course['total_class'];
            $excel['TEMPO CURSO HORAS'] 		= $course['timeH'];
            $excel['TEMPO CURSO MINUTOS'] 		= $course['timeM'];
    		$export[] 				= $excel;
    	}
    	return [
    		$export
        ];
    }

    public function headings():array
    {
        return [
            ['NOME', 'PREÇO', 'DESCRICAO', 'AUTOR', 'CATEGORIA', 'URN', 'REQUISITOS', 'TOTAL AULAS', 'TEMPO CURSO HORAS', 'TEMPO CURSO MINUTOS']
        ];
    }
}

