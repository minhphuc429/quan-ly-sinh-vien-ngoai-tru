<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Khoa;

class KhoasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $khoas = [
            [
                'MaKhoa'     => '480201',
                'TenKhoa'    => 'Công nghệ thông tin',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'MaKhoa'     => '220201',
                'TenKhoa'    => 'Ngôn Ngữ Anh',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'MaKhoa'     => '340101',
                'TenKhoa'    => 'Quản trị kinh doanh',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'MaKhoa'     => '340201',
                'TenKhoa'    => 'Tài chính ngân hàng',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'MaKhoa'     => '340301',
                'TenKhoa'    => 'Kế toán',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'MaKhoa'     => '340404',
                'TenKhoa'    => 'Quản trị nhân lực',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'MaKhoa'     => '340406',
                'TenKhoa'    => 'Quản trị văn phòng',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'MaKhoa'     => '380107',
                'TenKhoa'    => 'Luật kinh tế',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'MaKhoa'     => '510103',
                'TenKhoa'    => 'Công nghệ kỹ thuật xây dựng',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'MaKhoa'     => '510301',
                'TenKhoa'    => 'Công nghệ kỹ thuật điện điện tử',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'MaKhoa'     => '540101',
                'TenKhoa'    => 'Công nghệ thực phẩm',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'MaKhoa'     => '580102',
                'TenKhoa'    => 'Kiến trúc',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'MaKhoa'     => '720501',
                'TenKhoa'    => 'Điều dưỡng',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        foreach ($khoas as $khoa) {
            Khoa::create($khoa);
        }
    }
}
