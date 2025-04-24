<?php

namespace Database\Factories;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        return [
            'name' => $this->faker->word,
            'pricing' => $this->faker->randomFloat(2, 1, 100),
            'category_id' =>Category::factory(), // Create a new category for each product
            'descriptions' => $this->faker->sentence,
            'images' => json_encode([$this->faker->imageUrl(), $this->faker->imageUrl()]),


        ];
    }
}
