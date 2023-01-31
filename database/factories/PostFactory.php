<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     
    // protected $model = Post::class;
    
    public function definition()
    {
        return [
            // 'user_id' => fake()->numberBetween(1, 10),
            'zoo_id' => fake()->numberBetween(1, 50),
            'animal_family_id' => fake()->numberBetween(1, 62),
            'body' => fake()->realText(200),
        ];
    }
    
    
}
