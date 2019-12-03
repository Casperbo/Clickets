<?php

use Illuminate\Database\Seeder;

class VacanciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Vacancy::class, 1)->create(array(
            'title' => 'Wij zijn opzoek naar jou!',
            'description' => 'Heb jij zin om bij ons te komen werken, dan is deze vacature voor jou!',
            'user_id' => 3
        ));
        factory(\App\Vacancy::class, 1)->create(array(
            'title' => 'Zit niet stil werk met ons mee!',
            'description' => 'Dit zal voor een goede samenwerking zorgen.',
            'user_id' => 3
        ));
        factory(\App\Vacancy::class, 1)->create(array(
            'title' => 'Clickets de beste tickets site!',
            'description' => 'Wij zijn vernoemd tot beste ticket site en willen meer mensen in ons team!',
            'user_id' => 3
        ));
        factory(\App\Vacancy::class, 1)->create(array(
            'title' => 'Dromen van een baan bij Clickets',
            'description' => 'Deze droom kan nu in vervulling komen!',
            'user_id' => 3
        ));
        factory(\App\Vacancy::class, 1)->create(array(
            'title' => 'Samen staan we sterk!',
            'description' => 'Vergroot ons team, werk nu met ons mee!',
            'user_id' => 3
        ));
        // factory(\App\Occupations::class, 0)->create();
    }

}
