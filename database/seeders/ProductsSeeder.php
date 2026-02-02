<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
       
        $plantes = Category::where('name', 'Plantes')->first();
        $graines = Category::where('name', 'Graines')->first();

       
        Product::create([
            'name' => 'Monstera Deliciosa',
            'category_id' => $plantes->id,
            'price' => 34.99,
            'stock' => 15,
            'description' => "Plante tropicale d'intérieur avec grandes feuilles découpées.",
            'image' => 'https://images.unsplash.com/photo-1614594975525-e45190c55d0b?w=800&h=800&fit=crop'
        ]);

        Product::create([
            'name' => 'Graines de Tomates Bio',
            'category_id' => $graines->id,
            'price' => 4.50,
            'stock' => 50,
            'description' => "Variété ancienne de tomates cerises biologiques.",
            'image' => 'https://images.unsplash.com/photo-1592841200221-a6898f307baa?w=800&h=800&fit=crop'
        ]);
    }
}
