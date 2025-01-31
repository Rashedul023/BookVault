<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::firstOrCreate(
            ['name' => 'Self-Improvement'], 
            ['description' => 'Books that help you grow.']
        );

        Category::firstOrCreate(
            ['name' => 'Mathematics'], 
            ['description' => 'Books about mathematical concepts.']
        );

        Category::firstOrCreate(
            ['name' => 'Computer Science'], 
            ['description' => 'Books on programming, algorithms, and technology.']
        );
    }
}
