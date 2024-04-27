<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Student;
use Illuminate\Http\Request;

class HandleViewController extends Controller
{
    public function dashboard(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $totalStudent = Student::get()->count();
        $totalInstructor = Instructor::get()->count();
        $totalCourse = Course::get()->count();
        $totalMoney = 0;
        foreach (Course::get() as $course) {
            foreach ($course->enrollments as $enrollment) {
                $totalMoney += $enrollment->price;
            }
        }
        return view('admin.pages.index',  compact('totalStudent', 'totalInstructor', 'totalCourse', 'totalMoney'));
    }
}
