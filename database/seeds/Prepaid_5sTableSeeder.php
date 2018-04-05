<?php

use Illuminate\Database\Seeder;

class Prepaid_5sTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         factory(App\Prepaid_5::class, 10)->create();
    }
}
