<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_id' => null,
	        'title' => fake()->words(2, true),
	        'description' => fake()->sentence(),
	        'keywords' =>implode(', ', fake()->words()),
        ];
    }
}
