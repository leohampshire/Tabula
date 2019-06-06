<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromArray;
use App\BlogPost;
class BlogsExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $posts;

    public function __construct($posts)
    {
        $this->posts = $posts->toArray();
        
    }   
    public function array():array
    {
        
        $export = [];
        foreach ($this->posts as $post) {
            
    		$excel['NOME'] 		   			= $post['name'];
    		$excel['CATEGORIA'] 			= $post['this_category'];
            $excel['URN'] 					= $post['urn'];
            $excel['KEYWORDS SEO'] 			= $post['keywords'];
            $excel['META TITLE  SEO'] 		= $post['meta_title'];
            $excel['META DESCRIPTION  SEO'] = $post['meta_description'];
            $excel['CONTEÚDO'] 				= $post['content'];
    		$export[] 			   			= $excel;
    	}
    	return [
    		$export
        ];
    }

    public function headings():array
    {
        return [
            [ 'NOME', 'CATEGORIA', 'URN', 'KEYWORDS', 'META', 'META', 'CONTEÚDO']
        
        ];
    }
}

