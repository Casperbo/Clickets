<?php

use Illuminate\Database\Seeder;
use App\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(OccupationsTableSeeder::class);
        $this->call(AdvertisementsTableSeeder::class);
        $this->call(VacanciesTableSeeder::class);
        Model::unguard();
        $this->call(RolesAndPermissionsSeeder::class);
        Model::reguard();
    }
}
