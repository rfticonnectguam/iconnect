<?php

use Illuminate\Database\Seeder;

class Prepaid_10sTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Prepaid_10::class, 10)->create();
    }
}
