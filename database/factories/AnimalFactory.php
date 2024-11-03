<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->firstName(),
            'species'=>'Dog',
            'description' => fake()->paragraph(1),
            'image_url' => fake()->url(),
            'adoption_status' => fake()->boolean(),
            'age' => fake()->biasedNumberBetween(18, 100),
            'gender' => 'Male',
            'address' => fake()-> address()
        ];
    }
}
