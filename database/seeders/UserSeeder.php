<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');
        $admin = \App\Models\User::create([
            'name' => 'Writer',
            'email' => 'writer@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('writer');


    }
}
