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
//        $title = $this->faker->name;
//        $slug = Str::slug($title);
        return [
            'id' => $this->faker->uuid(),
            'title' => 'Lập trình Trí Tuệ Nhân Tạo',
            'slug' => 'lap-trinh-tri-tue-nhan-tao',
            'price' => $this->faker->randomFloat(2, 100000, 10000000),
            'thumbnail' => $this->faker->imageUrl('710', '488'),
//            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected', 'suspended']),
            'status' => 'approved',
            'user_id' => '0c575fec-497e-4eb8-8c4b-eafb3084e0b6',
            'course_category_id' => 'b9e1aedf-2c96-3788-ab4f-337d24e4b272',
            'description' => $this->faker->text,
        ];
    }
}
