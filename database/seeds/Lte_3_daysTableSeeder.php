<?php

use Illuminate\Database\Seeder;

class Lte_3_daysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Lte_3_day::class, 10)->create();
    }
}
