<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("admins")->insert([
            [
                "name"          => "tabula",
                "login"         => "tabula",
                "email"         => "tabula@tabula.com.br",
                "user_type_id"  => 1,
                "password"      => bcrypt("tabula"),
                "country_id"    => 1,
                "state_id"      => 1,
                "created_at"    => $now,
                "updated_at"    => $now,
            ], 
        ]);
    }
}
