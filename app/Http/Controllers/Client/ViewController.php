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
            $courses = Course::with('students')->get();
            $categories = CourseCategory::with('courses')->get();
            $popularCourses = Course::withCount(['students', 'reviews', 'subjects'])->with(['students', 'reviews', 'subjects'])
                ->get()
                ->sortByDesc('students_count')
                ->take(4)
                ->map(function ($course) {
                    $totalStars = $course->reviews->sum('rating');
                    $rating = $course->reviews_count > 0 ? $totalStars / $course->reviews_count : 0;
                    $course->setAttribute('subject_count', $course->students_count);
                    $course->setAttribute('student_count', $course->students_count);
                    $course->setAttribute('review_amount', $course->reviews_count);
                    $course->setAttribute('rating', $rating);
                    return $course;
                });

            return view('client.pages.index', compact('popularCourses', 'categories', 'courses'));
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
