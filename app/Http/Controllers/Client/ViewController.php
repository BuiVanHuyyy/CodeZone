<?php

    namespace App\Http\Controllers\Client;

    use App\Http\Controllers\Controller;
    use App\Models\Blog;
    use App\Models\Course;
    use App\Models\CourseCategory;
    use App\Models\Instructor;
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
            $popularCourses = Course::with(['category', 'subjects', 'students', 'reviews'])->withCount('students')->orderBy('students_count', 'desc')->take(4)->get();
            $blogs = Blog::where('status', 'approved')->orderByDesc('created_at')->take(3)->get();
            $topInstructors = Instructor::with(['courses', 'user', 'courses.students'])
                ->get()
                ->each(function ($instructor) {
                    $instructor->studentsAmount = $instructor->courses->sum(function ($course) {
                        return $course->students->where('status', 'paid')->count();
                    });
                })
                ->sortByDesc('studentsAmount')
                ->take(6);
            return view('client.pages.index', compact('popularCourses', 'categories', 'blogs', 'topInstructors'));
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
