<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Romance', 'slug' => 'romance'],
            ['name' => 'Action', 'slug' => 'action'],
            ['name' => 'Fantasy', 'slug' => 'fantasy'],
            ['name' => 'Mystery', 'slug' => 'mystery'],
            ['name' => 'Comedy', 'slug' => 'comedy'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
