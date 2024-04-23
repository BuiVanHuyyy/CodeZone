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
            'commentable_id' => $this->faker->numberBetween(1, 800),
//            'commentable_type' => $this->faker->randomElement(['course', 'lesion', 'blog']),
            'commentable_type' => $this->faker->randomElement(['lesion']),
            'parent_comment_id' => $this->faker->numberBetween(1, 200),
            'user_id' => $this->faker->numberBetween(1, 530),
            'content' => $this->faker->text('255')
        ];
    }
}
