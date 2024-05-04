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
            'order_id' => $this->faker->numberBetween(1, 522),
            'student_id' => $this->faker->numberBetween(31, 530),
            'course_id' => $this->faker->numberBetween(1, 17),
            'price' => $this->faker->numberBetween( 100000, 10000000),
//            'status' => $this->faker->randomElement(['paid', 'pending', 'failed']),
            'status' => $this->faker->randomElement(['paid']),
        ];
    }
}
