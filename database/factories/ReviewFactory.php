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
            'reviewable_id' => $this->faker->numberBetween(1, 10),
            'reviewable_type' => $this->faker->randomElement(['instructor']),
            'user_id' => $this->faker->numberBetween(31, 540),
            'content' => $this->faker->text('255'),
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
