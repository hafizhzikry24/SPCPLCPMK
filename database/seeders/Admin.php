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
            'NIP' => 'ADMIN1',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'Daffa',
            'email' => 'firefly@cantik.net',
            'NIP' => 'ADMIN2',
            'email_verified_at' => now(),
            'password' => bcrypt('fireflycintaku'),
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'Risma Septiana',
            'email' => 'risma.septiana@gmail.com',
            'NIP' => '198909122019032012',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'is_admin' => null
        ]);

        User::create([
            'name' => 'Agung Budi Prasetijo',
            'email' => 'agung@gmail.com',
            'NIP' => '197106061995121003',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'is_admin' => null
        ]);

        User::create([
            'name' => 'Bellia Dwi Cahya Putri',
            'email' => 'bellia@gmail.com',
            'NIP' => 'H.7.199210142022102001',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'is_admin' => null
        ]);
    }
}
