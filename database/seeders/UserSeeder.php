<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // ✅ tambahkan ini
use Illuminate\Support\Facades\DB; // ✅ tambahkan ini

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'un' => 'master',
            'email' => 'master@kla.com',
            'pw' => Hash::make('win999'), // password di-hash agar bisa dipakai login
            'role' => 'MASTER',
        ]);
    }
} 
