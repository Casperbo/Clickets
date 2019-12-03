<?php

use Illuminate\Database\Seeder;

class OccupationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Occupation::class, 1)->create(array(
            'occupationName' => 'Editor'
        ));
        factory(\App\Occupation::class, 1)->create(array(
            'occupationName' => 'Marketing'
        ));
        factory(\App\Occupation::class, 1)->create(array(
            'occupationName' => 'Communication'
        ));
        // factory(\App\Occupations::class, 0)->create();
    }
}
