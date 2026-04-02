<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Novel;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
   {
    $users = User::all();
    $novels = Novel::all();

    foreach ($novels as $novel) {
        for ($i = 0; $i < 0; $i++) {
            Review::create([
                'user_id' => $users->random()->id,
                'novel_id' => $novel->id,
                'rating' => rand(3,5),
                'comment' => fake()->sentence()
            ]);
        }
    }
}
}
