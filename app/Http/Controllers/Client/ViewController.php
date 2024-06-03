<?php

    namespace App\Http\Controllers\Client;

    use App\Http\Controllers\Controller;
    use App\Models\Course;
    use App\Models\CourseCategory;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;

    class ViewController extends Controller
    {
        /**
         * Show client home.
         */
        public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
        {
            $categories = CourseCategory::with('courses')->get();
            $popularCourses = Course::with(['category', 'subjects', 'students'])->withCount('students')->orderBy('students_count', 'desc')->take(4)->get();
            return view('client.pages.index', compact('popularCourses', 'categories'));
        }

        /**
         * Show client about.
         */
        public function about(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.about');
        }

        public function notFound(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.404');
        }
    }
