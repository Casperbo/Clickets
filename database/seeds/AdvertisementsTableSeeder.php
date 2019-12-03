<?php

use Illuminate\Database\Seeder;

class AdvertisementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Advertisement::class, 1)->create(array(
            'title' => 'Wij hebben bedrijven nodig!',
            'description' => 'Heel veel bedrijven.',
            'user_id' => 3
        ));
        factory(\App\Advertisement::class, 1)->create(array(
            'title' => 'Zit niet stil werk met ons mee!',
            'description' => 'Dit zal voor een goede samenwerking zorgen.',
            'user_id' => 3
        ));
        factory(\App\Advertisement::class, 1)->create(array(
            'title' => 'Clickets de beste tickets site!',
            'description' => 'Wij zijn vernoemd tot beste ticket site.',
            'user_id' => 3
        ));
        // factory(\App\Occupations::class, 0)->create();
    }
}
