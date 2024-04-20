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
            'commentable_id' => $this->faker->numberBetween(1, 100),
            'commentable_type' => $this->faker->randomElement(['course', 'lesion', 'blog']),
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'content' => $this->faker->text('255')
        ];
    }
}
