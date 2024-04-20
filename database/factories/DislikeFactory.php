<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dislike>
 */
class DislikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dislikeable_id' => $this->faker->numberBetween(1, 10),
            'dislikeable_type' => $this->faker->randomElement(['course', 'subject', 'lesion', 'instructor', 'review', 'comment', 'blog']),
            'user_id' => $this->faker->randomElement(User::pluck('id'))
        ];
    }
}
