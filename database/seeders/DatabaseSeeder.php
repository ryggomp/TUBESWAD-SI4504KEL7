<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Store;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'vendor']);

        User::create([
            'name' => 'user test',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole('user');
        User::create([
            'name' => 'admin test',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole('admin');
        User::create([
            'name' => 'vendor test',
            'email' => 'vendor@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole('vendor');

        Store::create([
            'name' => 'Tumbler',
            'price' => 60000,
            'photo' => 'tumbler.png'
        ]);
        Store::create([
            'name' => 'Piring',
            'price' => 20000,
            'photo' => 'piring.png'
        ]);
        Store::create([
            'name' => 'Sendal',
            'price' => 25000,
            'photo' => 'sendal.png'
        ]);
        Store::create([
            'name' => 'Vourcher Belanja',
            'price' => 5000,
            'photo' => 'voucherBelanja.png'
        ]);
        Store::create([
            'name' => 'Voucher Dufan',
            'price' => 80000,
            'photo' => 'voucherDufan.png'
        ]);
        Store::create([
            'name' => 'Case Handphone',
            'price' => 2500,
            'photo' => 'case.png'
        ]);
    }
}
