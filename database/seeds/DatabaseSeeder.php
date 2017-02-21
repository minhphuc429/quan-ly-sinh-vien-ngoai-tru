<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'Nguyễn Minh Phúc',
            'email' => 'minhphuc429@gmail.com',
            'password' => bcrypt('24041995'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        $user = User::where('email', '=', 'minhphuc429@gmail.com')->first();

        // role attach alias
        $user->attachRole($admin); // parameter can be an Role object, array, or id


    }
}
