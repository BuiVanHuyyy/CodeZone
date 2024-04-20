<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Dislike;
use App\Models\Enrollment;
use App\Models\Instructor;
use App\Models\Lesion;
use App\Models\Like;
use App\Models\Review;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        \App\Models\User::factory(530)->create();
//        Instructor::factory(30)->create();
//        Student::factory(700)->create();
//        CourseCategory::factory(4)->create();
//        Course::factory(16)->create();
//        Enrollment::factory(100)->create();
//        Subject::factory(150)->create();
//        Lesion::factory(500)->create();
        Like::factory(1000)->create();
//        Dislike::factory(1000)->create();
//        Comment::factory(1000)->create();
//        Review::factory(1000)->create();
    }
}
