<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LessonFactory extends Factory
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
            'id' => Str::uuid(),
            'title' => $title,
            'slug' => $slug,
            'content' => $this->faker->text,
            'is_preview' => $this->faker->boolean,
            'order' => $this->faker->numberBetween(1, 10),
            'subject_id' => 'f29340ca-fe95-4018-bf72-c7d15e42cd50',
        ];
    }
}
