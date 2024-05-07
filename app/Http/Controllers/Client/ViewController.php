<?php

    namespace App\Http\Controllers\Client;

    use App\Http\Controllers\Controller;
    use App\Models\Blog;
    use App\Models\Course;
    use App\Models\CourseCategory;
    use App\Models\Dislike;
    use App\Models\Instructor;
    use App\Models\Like;
    use App\Models\Review;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;
    use Illuminate\Support\Facades\Auth;

    class ViewController extends Controller
    {
        public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
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

        public function about(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.about');
        }

        public function showCourses(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
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

        public function showCourseDetail(string $slug): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
        {
            $course = Course::where('slug', $slug)->first();
            if (!$course) {
                return view('client.pages.404');
            }
            $reviews = Review::where('reviewable_id', $course->id)->where('reviewable_type', 'course')->get();
            foreach ($reviews as $review) {
                $likeAmount = Like::where('likeable_type', 'review')->where('likeable_id', $review->id)->count();
                $dislikeAmount = Dislike::where('dislikeable_type', 'review')->where('dislikeable_id', $review->id)->count();
                $review->setAttribute('like_amount', $likeAmount);
                $review->setAttribute('dislike_amount', $dislikeAmount);
            }
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
            if (Auth::check() && Auth::user()->students) {
                foreach (Auth::user()->students->courses as $item) {
                    if ($item->course_id == $course->id) {
                        $isBought = true;
                        break;
                    }
                }
            }
            return view('client.pages.course_detail', compact('course', 'isBought'));
        }

        public function showInstructors(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.all_instructors');
        }

        public function registerInstructor(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.become_instructor');
        }

        public function allBlogs(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
        {
            $blogs = Blog::where('status', 'approved')->get();
            return view('client.pages.all_blogs', compact('blogs'));
        }

        public function showBlogDetail(string $slug): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
        {
            $blog = Blog::where('slug', $slug)->first();
            if (!$blog) {
                return view('client.pages.404');
            }
            if(Auth::check()) {
                $blog->setAttribute('is_liked', Like::where('likeable_type', 'blog')->where('likeable_id', $blog->id)->where('user_id', Auth::id())->count() > 0);
                $blog->setAttribute('is_disliked', Dislike::where('dislikeable_type', 'blog')->where('dislikeable_id', $blog->id)->where('user_id', Auth::id())->count() > 0);
            }
            $like_amount = Like::where('likeable_type', 'blog')->where('likeable_id', $blog->id)->count();
            $dislike_amount = Dislike::where('dislikeable_type', 'blog')->where('dislikeable_id', $blog->id)->count();
            $comments = \App\Models\Comment::where('commentable_id', $blog->id)->where('commentable_type', 'blog')->get();
            foreach ($comments as $comment) {
                $comment->setAttribute('like_amount', Like::where('likeable_type', 'comment')->where('likeable_id', $comment->id)->count());
                $comment->setAttribute('dislike_amount', Dislike::where('dislikeable_type', 'comment')->where('dislikeable_id', $comment->id)->count());
                $comment->setAttribute('replies', \App\Models\Comment::where('commentable_id', $comment->id)->where('commentable_type', 'comment')->get());
                if (Auth::check()) {
                    $comment->setAttribute('is_liked', Like::where('likeable_type', 'comment')->where('likeable_id', $comment->id)->where('user_id', Auth::id())->count() > 0);
                    $comment->setAttribute('is_disliked', Dislike::where('dislikeable_type', 'comment')->where('dislikeable_id', $comment->id)->where('user_id', Auth::id())->count() > 0);
                }
                if ($comment->replies->count() > 0) {
                    foreach ($comment->replies as $reply) {
                        $reply->setAttribute('like_amount', Like::where('likeable_type', 'comment')->where('likeable_id', $reply->id)->count());
                        $reply->setAttribute('dislike_amount', Dislike::where('dislikeable_type', 'comment')->where('dislikeable_id', $reply->id)->count());
                        if (Auth::check()) {
                            $reply->setAttribute('is_liked', Like::where('likeable_type', 'comment')->where('likeable_id', $reply->id)->where('user_id', Auth::id())->count() > 0);
                            $reply->setAttribute('is_disliked', Dislike::where('dislikeable_type', 'comment')->where('dislikeable_id', $reply->id)->where('user_id', Auth::id())->count() > 0);
                        }
                    }
                }
            }
            return view('client.pages.blog_detail', compact('blog', 'like_amount', 'dislike_amount', 'comments'));
        }

        public function showStudentIndex(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.students.pages.index');
        }
        public function showStudentProfile(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.students.pages.profile');
        }
        public function showStudentEdit(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.students.pages.edit');
        }
        public function showInstructorIndex(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.instructors.pages.index');
        }
        public function showInstructorProfile(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.instructors.pages.profile');
        }
        public function showInstructorEdit(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.instructors.pages.edit');
        }
        public function showInstructorCourses(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.instructors.pages.my_course');
        }
        public function showInstructorReviews(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.instructors.pages.my_review');
        }
        public function showEnrolledCourses(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            $enrolledCourses = Auth::user()->students->courses->where('status', 'paid');
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
        public function showCreateCourse(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.instructors.pages.create_course');
        }
        public function notFound(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.404');
        }
        public function showProfile(Instructor $instructor): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            $reviews = Review::where('reviewable_id', $instructor->id)->where('reviewable_type', 'instructor')->get();
            foreach ($reviews as $review) {
                $review->setAttribute('like_amount', Like::where('likeable_type', 'review')->where('likeable_id', $review->id)->count());
                $review->setAttribute('dislike_amount', Dislike::where('dislikeable_type', 'review')->where('dislikeable_id', $review->id)->count());
            }
            $totalStars = $reviews->sum('rating');
            $rating = $reviews->count() > 0 ? $totalStars / $reviews->count() : 0;

            $isStudent = false;
            foreach ($instructor->courses as $course) {
                if ($course->enrollments->where('status', 'paid')->where('student_id', Auth::id())) {
                    $isStudent = true;
                    break;
                }
            }
            return view('client.pages.profile', compact('instructor', 'reviews', 'rating', 'isStudent'));
        }
        public function showCreateBlog(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            return view('client.pages.instructors.pages.create_blog');
        }
    }
