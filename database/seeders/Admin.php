<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin1',
            'email' => 'admin1@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'Daffa',
            'email' => 'firefly@cantik.net',
            'email_verified_at' => now(),
            'password' => bcrypt('fireflycintaku'),
            'is_admin' => 1
        ]);
    }
}
