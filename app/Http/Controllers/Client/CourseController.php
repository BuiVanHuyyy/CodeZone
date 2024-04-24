<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(string $course_slug, string $subject_slug = null, string $lesson_slug = null): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $course = Course::where('slug', $course_slug)->first();
        if (is_null($subject_slug)) {
            $subject_slug = $course->subjects()->orderBy('order')->first()->slug;
        }
        if (is_null($lesson_slug)) {
            $lesson_slug = $course->subjects()->where('slug', $subject_slug)->first()->lessons()->orderBy('order')->first()->slug;
        }
        return view('client.pages.students.pages.lesson', compact('course', 'subject_slug', 'lesson_slug'));
    }
}
