<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Plantes']);
        Category::create(['name' => 'Graines']);
        Category::create(['name' => 'Outils']);
    }
}
