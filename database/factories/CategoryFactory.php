<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
             "code" => fake()->regexify('[A-Z]{3}[0-4]{2}'),
             "name" => fake()->word(),
             "description" => fake()->text(255),
        ];
    }
}
