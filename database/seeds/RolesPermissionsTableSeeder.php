<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;

class RolesPermissionsTableSeeder extends Seeder
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

        $permission = [
            [
                'name'         => 'role-list',
                'display_name' => 'Display Role Listing',
                'description'  => 'See only Listing Of Role',
            ],
            [
                'name'         => 'role-create',
                'display_name' => 'Create Role',
                'description'  => 'Create New Role',
            ],
            [
                'name'         => 'role-edit',
                'display_name' => 'Edit Role',
                'description'  => 'Edit Role',
            ],
            [
                'name'         => 'role-delete',
                'display_name' => 'Delete Role',
                'description'  => 'Delete Role',
            ],
            [
                'name'         => 'ngoaitru-list',
                'display_name' => 'Display Item Listing',
                'description'  => 'See only Listing Of Item',
            ],
            [
                'name'         => 'ngoaitru-create',
                'display_name' => 'Create Ngoại Trú',
                'description'  => 'Tạo Mới Thông Tin Ngoại Trú',
            ],
            [
                'name'         => 'ngoaitru-edit',
                'display_name' => 'Sửa Ngoại Trú',
                'description'  => 'Edit Thông Tin Ngoại Trú',
            ],
            [
                'name'         => 'ngoaitru-delete',
                'display_name' => 'Xóa Ngoại Trú',
                'description'  => 'Xóa Thông Tin Ngoại Trú',
            ],
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
