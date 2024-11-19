<?php

namespace Database\Factories;
use App\Models\Quiz;
use App\Models\categories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    // Generate random options
    $options = [
        $this->faker->word,
        $this->faker->word,
        $this->faker->word,
        $this->faker->word,
    ];

    // Choose a random correct option from the options
    $correctOption = $this->faker->randomElement($options);

    // Fetch an existing quiz and category
    $quiz = Quiz::inRandomOrder()->first(); // Get a random existing quiz
    $category = categories::inRandomOrder()->first(); // Get a random existing category

    return [
        'quiz_id' => $quiz ? $quiz->id : null, // Get a random quiz ID from the database
        'category_id' => $category ? $category->id : null, // Get a random category ID from the database
        'question' => $this->faker->sentence(10), // Generates a random question with 10 words
        'correct_option' => $correctOption, // Set the correct option
        'options' => json_encode($options), // Convert the options array to JSON
        'created_at' => now(), // Set current timestamp
        'updated_at' => now(), // Set current timestamp
    ];
}
}

