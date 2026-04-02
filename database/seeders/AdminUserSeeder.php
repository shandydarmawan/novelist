<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Novel',
            'email' => 'novel@gmail.com',
            'password' => Hash::make('040508'),
            'is_admin' => true,
        ]);
    }
}
