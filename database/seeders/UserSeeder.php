<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'              => 'user',
            'email'             => 'user@user.com',
            'address'           => 'الحي السابع 154',
            'id_personal'       => 123456789,
            'code'              => null,
            'email_verified_at' => now(),
            'password'          => Hash::make(123456789),
        ]);
    }
}
