<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
		$price = $this->faker->randomFloat(2, 100, 10000);
        return [
			'category_id' => Category::InRandomOrder()->first()->id ?? 1,
			'title' => fake()->words(3, true),
			'content' => fake()->paragraphs(2, true),
			'price' => $price,
			'old_price' =>fake()->boolean(30)? $price *1.25 : null,
			'description' =>    fake()->sentence(),
			'keywords' => implode(',', fake()->words(5)),
			'img' => 'products/no-image.png',
			'is_offer' => fake()->boolean(20),
        ];
    }
}
