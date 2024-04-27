<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'likeable_id' => $this->faker->numberBetween(1, 1000),
//            'likeable_type' => $this->faker->randomElement(['course', 'subject', 'lesion', 'instructor', 'review', 'comment', 'blog']),
            'likeable_type' => $this->faker->randomElement(['review']),
            'user_id' => $this->faker->numberBetween(31, 530),
        ];
    }
}
