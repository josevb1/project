<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
        |--------------------------------------------------------------------------
        |  SEEDERS FOR LARAVEL USER MANAGEMENT
        |--------------------------------------------------------------------------
        |
        */
            $this->call(RoleTableSeeder::class);
            $this->call(PermissionTableSeeder::class);
            $this->call(DepartmentTableSeeder::class);
    }
}