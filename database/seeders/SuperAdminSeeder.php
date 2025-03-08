<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'super',
            'last_name' => 'admin',
            'full_name' => 'super admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('superadmin'),
            'email_verified_at' => now(),
        ])->assignRole('super admin');
    }
}
