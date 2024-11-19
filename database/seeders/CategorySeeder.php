<?php

namespace Database\Seeders;

use App\Models\Category; // This should be Category, not categories
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'HTML', 'description' => 'HyperText Markup Language']);
        Category::create(['name' => 'CSS', 'description' => 'Cascading Style Sheets']);
        Category::create(['name' => 'JS', 'description' => 'JavaScript']);
        Category::create(['name' => 'PHP', 'description' => 'PHP Hypertext Preprocessor']);
    }
}