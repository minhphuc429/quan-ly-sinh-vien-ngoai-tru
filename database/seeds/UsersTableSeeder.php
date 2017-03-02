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

        $i = 31450;
        $limit = $i + 10;
        $faker = Faker\Factory::create('vi_VN');

        for ($i; $i <= $limit; $i++) {
            DB::table('users')->insert([
                'name'       => $faker->firstName . ' ' . $faker->middleName . ' ' . $faker->lastName,
                'username'   => $i,
                'email'      => $i . '@donga.edu.vn',
                'password'   => bcrypt('abc.12345'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
