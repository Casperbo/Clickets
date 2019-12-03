<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'company',
            'email' => 'company@gmail.com',
            'company' => 1,
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'v-company',
            'email' => 'v-company@gmail.com',
            'company' => 1,
            'verified' => 1,
            'password' => bcrypt('password'),
        ]);
    }
}
