<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            "code" => fake()->unique()->regexify('[A-Z]{3}[0-4]{2}'),
            "name" => fake()->unique()->word(),
            "description" => fake()->text(255),
            "price" => fake()->numberBetween(100, 1000),
            "weight" => fake()->numberBetween(10, 500),
        ];
    }
}
