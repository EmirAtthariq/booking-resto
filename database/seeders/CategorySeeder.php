<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Parent category
        $makanan = Category::create([
            'name' => 'Makanan',
            'parent_id' => null
        ]);

        $minuman = Category::create([
            'name' => 'Minuman',
            'parent_id' => null
        ]);

        // Subcategories for Makanan
        Category::create([
            'name' => 'Appetizers',
            'parent_id' => $makanan->id
        ]);

        Category::create([
            'name' => 'Main Course',
            'parent_id' => $makanan->id
        ]);

        Category::create([
            'name' => 'Dessert',
            'parent_id' => $makanan->id
        ]);

        // Subcategories for Minuman
        Category::create([
            'name' => 'Minuman Panas',
            'parent_id' => $minuman->id
        ]);

        Category::create([
            'name' => 'Minuman Dingin',
            'parent_id' => $minuman->id
        ]);
    }
}
