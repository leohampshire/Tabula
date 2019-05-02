<?php

use Illuminate\Database\Seeder;

class SchoolingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("schoolings")->insert([
            [
                'name' => 'Fundamental - Incompleto',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
            	'name' => 'Fundamental - Completo',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
            	'name' => 'Médio - Incompleto',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
            	'name' => 'Médio - Completo',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
            	'name' => 'Superior - Incompleto',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
            	'name' => 'Superior - Completo',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
            	'name' => 'Pós Graduação - Incompleto',
                "created_at" => $now,
                "updated_at" => $now,
            ], [
            	'name' => 'Pós Graduação - Completo',
                "created_at" => $now,
                "updated_at" => $now,
            ], 
        ]);
    }
}