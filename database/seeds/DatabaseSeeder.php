<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(CourseItemTypesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(UserTypesTableSeeder::class);
        $this->call(SchoolingsTableSeeder::class);
    }
}
