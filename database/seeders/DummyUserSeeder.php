<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     User::insert([
        [
            'name' => 'koalla',
            'email' => 'koalla@gmail.com',
            'password' => Hash::make('password'),
        ],
        [
            'name' => 'princes',
            'email' => 'princes@gmail.com',
            'password' => Hash::make('password'),
        ],
        [
            'name' => 'tsuraya',
            'email' => 'tsuraya@gmail.com',
            'password' => Hash::make('password'),
        ],
        [
            'name' => 'shandy',
            'email' => 'shandy@gmail.com',
            'password' => Hash::make('password'),
        ],
    ]);
}
}
