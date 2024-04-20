<?php

namespace Database\Factories;

use App\Models\CourseCategory;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->name;
        $slug = Str::slug($title);
        return [
            'title' => $title,
            'slug' => $slug,
            'price' => $this->faker->randomFloat(2, 100000, 10000000),
            'thumbnail' => $this->faker->imageUrl('500', 500),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
            'instructor_id' => $this->faker->randomElement(Instructor::pluck('id')),
            'course_category_id' => $this->faker->randomElement(CourseCategory::pluck('id')),
            'description' => $this->faker->text,
        ];
    }
}
