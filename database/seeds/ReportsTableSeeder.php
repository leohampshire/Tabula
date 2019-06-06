<?php

use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table("reports")->insert([
            [
                "name"          => "Administradores",
                "type"         => "Admin",
            ],
            [
                "name"          => "Posts",
                "type"         => "BlogPost",
            ],
            [
                "name"          => "Empresas",
                "type"         => "Company",
            ],
            [
                "name"          => "Cupons",
                "type"         => "Coupon",
            ],
            [
                "name"          => "Cursos",
                "type"         => "Course",
            ],
            [
                "name"          => "Alunos no Curso",
                "type"         => "CourseUser",
            ],
            [
                "name"          => "Pedidos",
                "type"         => "Order",
            ],
            [
                "name"          => "Professor",
                "type"         => "Teacher",
            ],
            [
                "name"          => "Alunos",
                "type"         => "User",
            ],

        ]);
    }
}





