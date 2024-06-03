<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instructor>
 */
class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'phone_number' => $this->faker->phoneNumber(),
            'current_job' => $this->faker->jobTitle(),
            'education' => $this->faker->text(),
            'bio' => $this->faker->text(),
            'user_id' => '1d4f045a-5523-446c-aae1-8f8b1f9f45cf',
            'facebook' => $this->faker->url(),
            'github' => $this->faker->url(),
            'linkedin' => $this->faker->url(),
        ];
    }
}
