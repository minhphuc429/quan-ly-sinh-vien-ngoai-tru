<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ThongBaosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;
        $limit = $i + 10;
        $faker = Faker\Factory::create('vi_VN');

        for ($i; $i <= $limit; $i++) {
            DB::table('thong_baos')->insert([
                'title'       => $faker->sentence(6, true),
                'description' => $faker->sentence(32, true),
                'noidung'     => $faker->text(200),
                'created_at'  => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'  => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
