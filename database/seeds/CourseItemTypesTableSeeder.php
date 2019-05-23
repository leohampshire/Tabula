<?php

use Illuminate\Database\Seeder;

class CourseItemTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("course_item_types")->insert([
        	[
        		"name"			=> "video",
                "value"         => "Video",
        		"created_at"	=> $now,
        		"updated_at"	=> $now,	
        	], [
        		"name"			=> "imagem",
                "value"         => "Imagem",
        		"created_at"	=> $now,
        		"updated_at"	=> $now,
        	], [
        		"name"			=> "texto",
                "value"         => "Texto",
        		"created_at"	=> $now,
        		"updated_at"	=> $now,
        	], [
        		"name"			=> "audio",
                "value"         => "Audio",
        		"created_at"	=> $now,
        		"updated_at"	=> $now,
        	], [
                "name"          => "complemento",
                "value"         => "Complemento",
                "created_at"    => $now,
                "updated_at"    => $now,
            ],[
                "name"          => "prova",
                "value"         => "Prova",
                "created_at"    => $now,
                "updated_at"    => $now,
            ], [
                "name"          => "multipla_escolha",
                "value"         => "Multipla Escolha",
                "created_at"    => $now,
                "updated_at"    => $now,
            ], [
                "name"          => "truefalse",
                "value"         => "Verdadeiro/Falso",
                "created_at"    => $now,
                "updated_at"    => $now,
            ],	[
            	"name"			=> "alternativas",
                "value"         => "Alternativa",
            	"created_at"    => $now,
                "updated_at"    => $now,
            ], [
                "name"          => "dissertativa",
                "value"         => "Dissertativa",
                "created_at"    => $now,
                "updated_at"    => $now,
            ]
        ]);
    }
}
