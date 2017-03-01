<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Khoa;
use App\Lop;
use App\SinhVien;

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
                'MaKhoa'  => 'C220113',
                'TenKhoa' => 'Việt Nam học',
            ],
            [
                'MaKhoa'  => 'C220201',
                'TenKhoa' => 'Tiếng Anh',
            ],
            [
                'MaKhoa'  => 'C340101',
                'TenKhoa' => 'Quản trị kinh doanh',
            ],
            [
                'MaKhoa'  => 'C340201',
                'TenKhoa' => 'Tài chính ngân hàng',
            ],
            [
                'MaKhoa'  => 'C340301',
                'TenKhoa' => 'Kế toán',
            ],
            [
                'MaKhoa'  => 'C340404',
                'TenKhoa' => 'Quản trị nhân lực',
            ],
            [
                'MaKhoa'  => 'C340406',
                'TenKhoa' => 'Quản trị văn phòng',
            ],
            [
                'MaKhoa'  => 'C380107',
                'TenKhoa' => 'Luật kinh tế',
            ],
            [
                'MaKhoa'  => 'C480201',
                'TenKhoa' => 'Công nghệ thông tin',
            ],
            [
                'MaKhoa'  => 'C510103',
                'TenKhoa' => 'Công nghệ kỹ thuật xây dựng',
            ],
            [
                'MaKhoa'  => 'C510301',
                'TenKhoa' => 'Công nghệ kỹ thuật điện điện tử',
            ],
            [
                'MaKhoa'  => 'C540101',
                'TenKhoa' => 'Công nghệ thực phẩm',
            ],
            [
                'MaKhoa'  => 'C580102',
                'TenKhoa' => 'Kiến trúc',
            ],
            [
                'MaKhoa'  => 'C720501',
                'TenKhoa' => 'Điều dưỡng',
            ],
            [
                'MaKhoa'  => 'D220201',
                'TenKhoa' => 'Ngôn Ngữ Anh',
            ],
            [
                'MaKhoa'  => 'D340101',
                'TenKhoa' => 'Quản trị kinh doanh',
            ],
            [
                'MaKhoa'  => 'D340201',
                'TenKhoa' => 'Tài chính ngân hàng',
            ],
            [
                'MaKhoa'  => 'D340301',
                'TenKhoa' => 'Kế toán',
            ],
            [
                'MaKhoa'  => 'D340404',
                'TenKhoa' => 'Quản trị nhân lực',
            ],
            [
                'MaKhoa'  => 'D340406',
                'TenKhoa' => 'Quản trị văn phòng',
            ],
            [
                'MaKhoa'  => 'D380107',
                'TenKhoa' => 'Luật kinh tế',
            ],
            [
                'MaKhoa'  => 'D480201',
                'TenKhoa' => 'Công nghệ thông tin',
            ],
            [
                'MaKhoa'  => 'D510103',
                'TenKhoa' => 'Công nghệ kỹ thuật xây dựng',
            ],
            [
                'MaKhoa'  => 'D510301',
                'TenKhoa' => 'Công nghệ kỹ thuật điện điện tử',
            ],
            [
                'MaKhoa'  => 'D540101',
                'TenKhoa' => 'Công nghệ thực phẩm',
            ],
            [
                'MaKhoa'  => 'D580102',
                'TenKhoa' => 'Kiến trúc',
            ],
            [
                'MaKhoa'  => 'D720501',
                'TenKhoa' => 'Điều dưỡng',
            ],
        ];

        foreach ($khoas as $khoa) {
            Khoa::create($khoa);
        }

        /* Lớp */
        $lops = [
            [
                'MaLop'  => 'CT14A1.11',
                'TenLop' => 'CT14A1.11',
                'MaKhoa' => 'D480201',
            ],
            [
                'MaLop'  => 'CT14A1.12',
                'TenLop' => 'CT14A1.12',
                'MaKhoa' => 'D480201',
            ],
        ];

        foreach ($lops as $lop) {
            Lop::create($lop);
        }

        /* Sinh Viên */
        for ($i = 33200; $i <= 33300; $i++) {
            DB::table('sinh_viens')->insert([
                'MaSV'       => $i,
                'MaLop'      => 'CT14A1.11',
                'GioiTinh'   => 1,
                'NgaySinh'   => Carbon::createFromTimestamp(rand(Carbon::now()->subYears(21)->timestamp, Carbon::now()->subYears(22)->timestamp))->format('Y-m-d H:i:s'),
                'DiaChi'     => '',
                'DienThoai'  => '',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
