<?php

namespace Database\Factories;

use App\Models\Zoo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Zoo>
 */
class ZooFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     
    public function definition()
    {
        return [
            'admin_id' => 1,
            'prefecture_id' => fake()->numberBetween(1, 47),
            'zoo_name' => fake()->unique()->name(),
            'caption'=> fake()->realText(120), 
            'adress' => fake()->address(),
            'hp_url' => fake()->url,
            'seniors_price' => fake()->numberBetween($min = 500, $max = 4000),
            'adults_price' => fake()->numberBetween($min = 100, $max = 3000),
            'hsstudents_price' => fake()->numberBetween($min = 50, $max = 2500),
            'jhsstudents_price' => fake()->numberBetween($min = 0, $max = 1000),
            'esstudents_price' => fake()->numberBetween($min = 0, $max = 500),
            'children_price' => fake()->numberBetween($min = 0, $max = 500),
        ];
    }
}
