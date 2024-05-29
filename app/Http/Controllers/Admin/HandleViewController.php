<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Course;
    use App\Models\Enrollment;
    use App\Models\Instructor;
    use App\Models\Student;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;

    class HandleViewController extends Controller
    {
        public function dashboard(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
        {
            $totalStudent = Student::count();
            $totalInstructor = Instructor::count();
            $totalCourse = Course::count();
            $totalMoney = Enrollment::sum('price');
            return view('admin.pages.index', compact('totalStudent', 'totalInstructor', 'totalCourse', 'totalMoney'));
        }
    }
