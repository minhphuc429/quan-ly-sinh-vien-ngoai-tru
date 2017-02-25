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

        /* Lớp */
        $lops = [
            [
                'MaLop'  => 'CT14A1.11',
                'TenLop' => 'CT14A1.11',
                'MaKhoa' => '480201',
            ],
            [
                'MaLop'  => 'CT14A1.12',
                'TenLop' => 'CT14A1.12',
                'MaKhoa' => '480201',
            ],
        ];

        foreach ($lops as $lop) {
            Lop::create($lop);
        }

        /* Sinh Viên */
        $sinhviens = [
            [
                'MaSV'      => '33639',
                'HoTen'     => 'Lê Minh Danh',
                'GioiTinh'  => 1,
                'NgaySinh'  => '1996-09-08',
                'DiaChi'    => 'Tổ 5 - Thôn 10 Tiên Lãnh - Tiên Phước - Quảng Nam',
                'MaLop'     => 'CT14A1.11',
                'DienThoai' => '1629255284',
                'Email'     => '33639@donga.edu.vn',
            ],
            [
                'MaSV'      => '34213',
                'HoTen'     => 'Nguyễn Văn Đạt',
                'GioiTinh'  => 1,
                'NgaySinh'  => '1996-10-20',
                'DiaChi'    => 'Thôn Tích Phú Đại Hiệp - Đại Lộc - Quảng Nam',
                'MaLop'     => 'CT14A1.11',
                'DienThoai' => '01262.781.926',
                'Email'     => '34213@donga.edu.vn',
            ],
        ];

        foreach ($sinhviens as $sinhvien) {
            SinhVien::create($sinhvien);
        }
    }
}
