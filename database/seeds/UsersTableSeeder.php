<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('users')->insert([
            'username'   => '33205',
            'name'       => 'Nguyễn Minh Phúc',
            'email'      => '33205@donga.edu.vn',
            'password'   => bcrypt('abc.12345'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);*/

        for ($i = 33200; $i <= 33300; $i++) {
            DB::table('users')->insert([
                'username' => $i,
                'name'     => str_random(10),
                'email'    => $i . '@donga.edu.vn',
                'password' => bcrypt('abc.12345'),
            ]);
        }
    }
}
