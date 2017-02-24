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
        for ($i = 30000; $i <= 30010; $i++) {
            DB::table('users')->insert([
                'username' => $i,
                'name'     => str_random(10),
                'email'    => $i . '@donga.edu.vn',
                'password' => bcrypt('abc.12345'),
            ]);
        }
    }
}
