<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrollment>
 */
class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => $this->faker->unique()->numberBetween(1, 400),
            'course_id' => $this->faker->numberBetween(1, 16),
            'price' => $this->faker->randomFloat(2, 100000, 10000000),
//            'status' => $this->faker->randomElement(['paid', 'pending', 'failed']),
//            'status' => $this->faker->randomElement(['paid', 'pending', 'failed']),
            'status' => $this->faker->randomElement(['pending', 'failed']),
        ];
    }
}
