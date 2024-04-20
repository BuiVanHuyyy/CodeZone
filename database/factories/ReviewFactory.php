<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reviewable_id' => $this->faker->numberBetween(1, 100),
            'reviewable_type' => $this->faker->randomElement(['course', 'instructor']),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'content' => $this->faker->text('255'),
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
