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
            'name'       => 'Nguyễn Minh Phúc',
            'username'   => 'minhphuc429',
            'password'   => bcrypt('24041995'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);*/

        for ($i = 30000; $i <= 40000; $i++) {
            DB::table('users')->insert([
                'name'       => str_random(10),
                'username'   => $i,
                'email'      => $i . '@donga.edu.vn',
                'password'   => bcrypt('abc.12345'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
