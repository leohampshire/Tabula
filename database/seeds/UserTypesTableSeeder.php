<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("user_types")->insert([
            [
                "name"       => "Admin",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Suporte",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Aluno",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Professor",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "name"       => "Empresa",
                "created_at" => $now,
                "updated_at" => $now,
            ], 
        ]);
    }
}
