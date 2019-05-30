<?php

use Illuminate\Database\Seeder;

class TaxasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("taxas")->insert([
            [
                "taxa_tabula"          => "30",
                "taxa_users"         => "70",
            ], 
        ]);
    }
}
