<?php

    namespace App\Http\Controllers\Client;

    use App\Http\Controllers\Controller;
    use App\Models\Course;
    use App\Models\CourseCategory;
    use App\Models\Dislike;
    use App\Models\Like;
    use App\Models\Review;
    use Illuminate\Support\Facades\Auth;

    class ViewController extends Controller
    {
        public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
        {
            $courses = Course::all();
            $categories = CourseCategory::all();
            $popularCourses = $courses->sortByDesc(function ($course) {
                $course->setAttribute('student_count', $course->students->count());
                return $course->students->count();
            })->take(4);
            foreach ($popularCourses as $id => $course) {
                $reviews = Review::where('reviewable_type', 'course')->where('reviewable_id', $id)->get();
                $totalStars = 0;
                foreach ($reviews as $review) {
                    $totalStars += $review->rating;
                }
                if (count($reviews) > 0) {
                    $rating = $totalStars / count($reviews);
                } else {
                    $rating = 0;
                }
                $course->setAttribute('review_amount', $reviews->count());
                $course->setAttribute('rating', $rating);
            }

            return view('client.pages.index', compact('popularCourses', 'categories', 'courses'));
        }

        public function about(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.about');
        }

        public function showCourses(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
        {
            $courses = Course::where('status', 'approved')->get();
            foreach ($courses as $course) {
                $reviews = Review::where('reviewable_id', $course->id)->where('reviewable_type', 'course')->get();
                $totalStars = 0;
                foreach ($reviews as $review) {
                    $totalStars += $review->rating;
                }
                if (count($reviews) > 0) {
                    $rating = $totalStars / count($reviews);
                } else {
                    $rating = 0;
                }
                $course->setAttribute('review_amount', $reviews->count());
                $course->setAttribute('rating', $rating);
            }
            $categories = CourseCategory::all();
            return view('client.pages.all_courses', compact('courses', 'categories'));
        }

        public function showCourseDetail(string $slug): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
        {
            $course = Course::where('slug', $slug)->first();
            $reviews = Review::where('reviewable_id', $course->id)->where('reviewable_type', 'course')->get();
            $reviews->map(function ($review) {
                $likeAmount = Like::where('likeable_type', 'review')->where('likeable_id', $review->id)->count();
                $dislikeAmount = Dislike::where('dislikeable_type', 'review')->where('dislikeable_id', $review->id)->count();
                $review->setAttribute('like_amount', $likeAmount);
                $review->setAttribute('dislike_amount', $dislikeAmount);
                return $review;
            });
            $totalStars = 0;
            foreach ($reviews as $review) {
                $totalStars += $review->rating;
            }
            if (count($reviews) > 0) {
                $rating = $totalStars / count($reviews);
            } else {
                $rating = 0;
            };
            $totalAuthorStudents = 0;
            foreach ($course->author->courses as $authorCourse) {
                $totalAuthorStudents += $authorCourse->enrollments->count();
            }

            $course->author->setAttribute('additional_info', [
                'reviews' => Review::where('reviewable_type', 'instructor')->where('reviewable_id', $course->author->id)->get(),
                'rating' => Review::where('reviewable_type', 'instructor')->where('reviewable_id', $course->author->id)->avg('rating') ?? 0,
                'like_amount' => Like::where('likeable_type', 'instructor')->where('likeable_id', $course->author->id)->count(),
                'dislike_amount' => Dislike::where('dislikeable_type', 'instructor')->where('dislikeable_id', $course->author->id)->count(),
                'total_students' => $totalAuthorStudents,
                ''
            ]);
            $likeAmount = Like::where('likeable_type', 'course')->where('likeable_id', $course->id)->count();
            $dislikeAmount = Dislike::where('dislikeable_type', 'course')->where('dislikeable_id', $course->id)->count();
            $course->setAttribute('like_amount', $likeAmount);
            $course->setAttribute('dislike_amount', $dislikeAmount);
            $course->setAttribute('rating', $rating);
            $course->setAttribute('reviews', $reviews);
            $isBought = false;
            if (Auth::check()) {
                foreach (Auth::user()->students->courses as $item) {
                    if ($item->course_id == $course->id) {
                        $isBought = true;
                        break;
                    }
                }
            }
            return view('client.pages.course_detail', compact('course', 'isBought'));
        }

        public function showInstructors(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.all_instructors');
        }

        public function showInstructorDetail(string $slug): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.instructor_detail');
        }

        public function registerInstructor(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.become_instructor');
        }

        public function allBlogs(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.all_blogs');
        }

        public function showBlogDetail(string $slug): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.blog_detail');
        }

        public function showStudentIndex(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.students.pages.index');
        }

        public function showStudentProfile(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.students.pages.profile');
        }

        public function showStudentEdit(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.students.pages.edit');
        }

        public function showInstructorIndex(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.students.pages.index');
        }

        public function showInstructorProfile(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.students.pages.profile');
        }

        public function showInstructorEdit(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.students.pages.edit');
        }

        public function showEnrolledCourses(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
        {
            $enrolledCourses = Auth::user()->students->courses;
            foreach ($enrolledCourses as $course) {
                $reviews = Review::where('reviewable_id', $course->course_id)->where('reviewable_type', 'course')->get();
                $totalStars = 0;
                foreach ($reviews as $review) {
                    $totalStars += $review->rating;
                }
                if (count($reviews) > 0) {
                    $rating = $totalStars / count($reviews);
                } else {
                    $rating = 0;
                }
                $course->setAttribute('review_amount', $reviews->count());
                $course->setAttribute('rating', number_format($rating, 1));
            }
            return view('client.pages.students.pages.enrolled_courses', compact('enrolledCourses'));
        }
    }
