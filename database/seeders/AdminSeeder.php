<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds to create default Administrator account.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@impidream.id'],
            [
                'name' => 'Administrator ImpiDream',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );
    }
}
