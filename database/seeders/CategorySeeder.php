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
            ['title' => 'All Brands', 'parent_id' => null],
            ['title' => 'Vegetables', 'parent_id' => null],
            ['title' => 'Fruits', 'parent_id' => null],
            ['title' => 'Juices', 'parent_id' => null],
            ['title' => 'Pet Food', 'parent_id' => null],
            ['title' => 'Bread & Bakery', 'parent_id' => null],
            ['title' => 'Cleaning', 'parent_id' => null],
            ['title' => 'Spices', 'parent_id' => null],
            ['title' => 'Dry Fruits', 'parent_id' => null],
            ['title' => 'Dairy Products', 'parent_id' => null],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Add some subcategories
        $vegetables = Category::where('title', 'Vegetables')->first();
        $fruits = Category::where('title', 'Fruits')->first();
        
        Category::create(['title' => 'Fresh Vegetables', 'parent_id' => $vegetables->id]);
        Category::create(['title' => 'Organic Vegetables', 'parent_id' => $vegetables->id]);
        Category::create(['title' => 'Seasonal Fruits', 'parent_id' => $fruits->id]);
        Category::create(['title' => 'Tropical Fruits', 'parent_id' => $fruits->id]);
    }
}
