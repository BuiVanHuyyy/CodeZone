<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'commentable_id' => $this->faker->numberBetween(1, 1500),
//            'commentable_type' => $this->faker->randomElement(['comment', 'course', 'lesion', 'blog']),
            'commentable_type' => $this->faker->randomElement(['comment']),
            'user_id' => $this->faker->numberBetween(31, 530),
            'content' => $this->faker->text('255')
        ];
    }
}
