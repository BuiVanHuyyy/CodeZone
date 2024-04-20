<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseCategory>
 */
class CourseCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->name();
        $slug = Str::slug($title);
        return [
            'title' => $title,
            'slug' => $slug,
            'thumbnail' => $this->faker->imageUrl(500, 500),
        ];
    }
}
