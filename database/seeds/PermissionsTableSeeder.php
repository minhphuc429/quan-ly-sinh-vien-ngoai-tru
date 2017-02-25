<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
