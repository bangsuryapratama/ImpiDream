<?php

namespace Database\Seeders;

use App\Models\Dream;
use App\Models\DreamProgress;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Sample Users
        $users = [
            [
                'name' => 'Dinda Mahasiswi',
                'email' => 'dinda@impidream.id',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Rangga Freshgrad',
                'email' => 'rangga@impidream.id',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Sari Freelancer',
                'email' => 'sari@impidream.id',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Bagus Software Eng',
                'email' => 'bagus@impidream.id',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Wulan UMKM',
                'email' => 'wulan@impidream.id',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(['email' => $userData['email']], $userData);
        }

        $dinda = User::where('email', 'dinda@impidream.id')->first();
        $rangga = User::where('email', 'rangga@impidream.id')->first();
        $sari = User::where('email', 'sari@impidream.id')->first();
        $bagus = User::where('email', 'bagus@impidream.id')->first();

        // 2. Create Sample Dreams & Progress History
        $sampleDreams = [
            [
                'user_id' => $dinda->id,
                'name' => 'MacBook Air M2 256GB',
                'category' => 'Elektronik',
                'target_amount' => 16000000.00,
                'current_amount' => 10880000.00,
                'target_date' => now()->addMonths(6)->toDateString(),
                'status' => 'active',
            ],
            [
                'user_id' => $rangga->id,
                'name' => 'Honda Vario 160 ABS',
                'category' => 'Kendaraan',
                'target_amount' => 27000000.00,
                'current_amount' => 11340000.00,
                'target_date' => now()->addMonths(12)->toDateString(),
                'status' => 'active',
            ],
            [
                'user_id' => $sari->id,
                'name' => 'Canon EOS R50 Body Only',
                'category' => 'Elektronik',
                'target_amount' => 10000000.00,
                'current_amount' => 10000000.00,
                'target_date' => now()->subDays(5)->toDateString(),
                'status' => 'completed',
            ],
            [
                'user_id' => $bagus->id,
                'name' => 'Dana Liburan Bali 5 Hari',
                'category' => 'Travel & Liburan',
                'target_amount' => 8500000.00,
                'current_amount' => 2500000.00,
                'target_date' => now()->addMonths(4)->toDateString(),
                'status' => 'active',
            ],
            [
                'user_id' => $bagus->id,
                'name' => 'Tabungan Momen Nikah',
                'category' => 'Life Milestone',
                'target_amount' => 50000000.00,
                'current_amount' => 32000000.00,
                'target_date' => now()->addMonths(18)->toDateString(),
                'status' => 'active',
            ],
        ];

        foreach ($sampleDreams as $dreamData) {
            $dream = Dream::create($dreamData);

            // Create Wallet for Dream
            Wallet::create([
                'dream_id' => $dream->id,
                'user_id' => $dream->user_id,
                'provider_type' => 'manual',
                'provider_status' => 'active',
                'balance' => $dream->current_amount,
            ]);

            // Add progress log
            if ($dream->current_amount > 0) {
                DreamProgress::create([
                    'dream_id' => $dream->id,
                    'amount' => $dream->current_amount,
                    'note' => 'Setoran Awal Tabungan Impian',
                    'recorded_at' => now()->subDays(2),
                ]);
            }
        }
    }
}
