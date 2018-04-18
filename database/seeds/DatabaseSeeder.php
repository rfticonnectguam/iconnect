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
        // $this->call(UsersTableSeeder::class);
        $this->call(Prepaid_5sTableSeeder::class);
        $this->call(Prepaid_10sTableSeeder::class);
        $this->call(Lte_3_daysTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        
    }
}
