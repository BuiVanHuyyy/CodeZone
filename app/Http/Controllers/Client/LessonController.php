<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Course;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use \App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function index(string $course_slug, string $subject_slug = null, string $lesson_slug = null): Application|Factory|View|\Illuminate\Foundation\Application
    {
        $course = Course::where('slug', $course_slug)->first();
        if (!$course || $course->status !== 'approved') {
            return view('client.pages.404');
        }
        if (Auth::user()->isInstructor() && !Auth::user()->instructor->checkInstructorIsAuthor($course->id)) {
            return view('client.pages.404');
        }
        if(Auth::user()->isStudent() && !Auth::user()->student->checkStudentIsEnrolled($course->id)) {
            return view('client.pages.404');
        }
        if (is_null($subject_slug)) {
            $subject_slug = $course->subjects()->orderBy('order')->first()->slug;
        }
        if (is_null($lesson_slug)) {
            $lesson_slug = $course->subjects()->where('slug', $subject_slug)->first()->lessons()->orderBy('order')->first()->slug;
        }
        $lesson = Lesson::where('slug', $lesson_slug)->first();
        if (!$lesson) {
            return view('client.pages.404');
        }
        return view('client.pages.students.pages.lesson', compact('course', 'lesson'));
    }
}
