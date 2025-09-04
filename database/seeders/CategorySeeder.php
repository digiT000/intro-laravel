<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            ['name' => 'Technology'],
            ['name' => 'Food & Recipes'],
            ['name' => 'Travel'],
            ['name' => 'Health & Fitness'],
            ['name' => 'Finance & Investing'],
            ['name' => 'Education & Learning'],
            ['name' => 'Lifestyle'],
            ['name' => 'Entertainment'],
            ['name' => 'Business & Startups'],
            ['name' => 'Science & Innovation'],
        ];
    
        Category::insert($categories);
    }
}
