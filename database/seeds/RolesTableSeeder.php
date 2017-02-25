<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = new Role();
        $root->name = 'root';
        $root->display_name = 'User Super Administrator'; // optional
        $root->description = 'Người dùng quyền cao nhất'; // optional
        $root->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description = 'Người dùng được phép quản lý và chỉnh sửa người dùng khác dưới quyền'; // optional
        $admin->save();

        $sinhvien = new Role();
        $sinhvien->name = 'sinhvien';
        $sinhvien->display_name = 'User Sinh Viên'; // optional
        $sinhvien->description = 'Người dùng được phép cập nhật thông tin cá nhân, ngoại trú'; // optional
        $sinhvien->save();

        // role attach alias
        /*$user = User::where('email', '=', '33205@donga.edu.vn')->first();
        $user->attachRole($root); // parameter can be an Role object, array, or id*/
    }
}
