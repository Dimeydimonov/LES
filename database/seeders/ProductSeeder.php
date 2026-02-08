<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'Fortune Sunflower Oil',
                'content' => 'Premium quality sunflower oil',
                'description' => 'Pure and healthy sunflower oil perfect for cooking',
                'price' => 7.99,
                'old_price' => 10.00,
                'img' => 'images/1.png',
                'keywords' => 'oil, sunflower, cooking',
                'is_offer' => true,
                'category_id' => 1, // All Brands
            ],
            [
                'title' => 'Basmati Rice (5 Kg)',
                'content' => 'Premium basmati rice',
                'description' => 'Long grain aromatic basmati rice from Himalayas',
                'price' => 11.99,
                'old_price' => 15.00,
                'img' => 'images/2.png',
                'keywords' => 'rice, basmati, grain',
                'is_offer' => true,
                'category_id' => 1, // All Brands
            ],
            [
                'title' => 'Pepsi Soft Drink (2 Ltr)',
                'content' => 'Refreshing soft drink',
                'description' => 'Classic Pepsi soft drink in 2 liter bottle',
                'price' => 8.00,
                'old_price' => 10.00,
                'img' => 'images/3.png',
                'keywords' => 'drink, pepsi, soft',
                'is_offer' => true,
                'category_id' => 4, // Juices
            ],
            [
                'title' => 'Dogs Food (4 Kg)',
                'content' => 'Nutritious dog food',
                'description' => 'Complete and balanced nutrition for adult dogs',
                'price' => 9.00,
                'old_price' => 11.00,
                'img' => 'images/4.png',
                'keywords' => 'pet, dog, food',
                'is_offer' => true,
                'category_id' => 5, // Pet Food
            ],
            [
                'title' => 'Fresh Apples',
                'content' => 'Fresh red apples',
                'description' => 'Crispy and sweet red apples from local farms',
                'price' => 4.99,
                'old_price' => null,
                'img' => 'images/1.jpg',
                'keywords' => 'fruit, apple, fresh',
                'is_offer' => false,
                'category_id' => 3, // Fruits
            ],
            [
                'title' => 'Organic Tomatoes',
                'content' => 'Fresh organic tomatoes',
                'description' => 'Ripe organic tomatoes perfect for salads',
                'price' => 3.49,
                'old_price' => null,
                'img' => 'images/2.jpg',
                'keywords' => 'vegetable, tomato, organic',
                'is_offer' => false,
                'category_id' => 2, // Vegetables
            ],
            [
                'title' => 'Whole Wheat Bread',
                'content' => 'Healthy bread option',
                'description' => 'Freshly baked whole wheat bread rich in fiber',
                'price' => 2.99,
                'old_price' => null,
                'img' => 'images/1.jpg',
                'keywords' => 'bread, wheat, bakery',
                'is_offer' => false,
                'category_id' => 6, // Bread & Bakery
            ],
            [
                'title' => 'Orange Juice',
                'content' => 'Fresh orange juice',
                'description' => '100% pure orange juice without preservatives',
                'price' => 5.99,
                'old_price' => null,
                'img' => 'images/2.jpg',
                'keywords' => 'juice, orange, fresh',
                'is_offer' => false,
                'category_id' => 4, // Juices
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
