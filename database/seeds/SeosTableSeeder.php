<?php

use Illuminate\Database\Seeder;

class SeosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("seos")->insert([
            [
                "meta_title"          => "Home",
                "meta_description"         => "home",
            ], 
        ]);
    }
}
