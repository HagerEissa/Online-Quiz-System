<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\categories;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        ;
        return [
            'user_id' => User::factory(), // Create a user if you want to link it
            'category_id' => Categories::factory(), // Create a category if you want to link it
            'title' => $this->faker->sentence(3), // Generates a random title
            'duration' => $this->faker->numberBetween(5, 120), // Duration in minutes
            'level' => $this->faker->randomElement(['easy', 'medium', 'hard']), // Randomly selects a level
        ];
    }
}
