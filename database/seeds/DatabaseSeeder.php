<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeder User
        $this->call(UsersTableSeeder::class);

        // Seeder Role & Permission
        $this->call(RolesTableSeeder::class);
        $this->call(KhoasTableSeeder::class);
    }
}
