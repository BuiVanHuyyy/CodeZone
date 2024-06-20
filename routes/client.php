<?php

    use App\Http\Controllers\Client\BlogController;
    use App\Http\Controllers\Client\CartController;
    use App\Http\Controllers\Client\CommentController;
    use App\Http\Controllers\Client\CourseController;
    use App\Http\Controllers\Client\FacebookController;
    use App\Http\Controllers\Client\GoogleLoginController;
    use App\Http\Controllers\Client\InstructorController;
    use App\Http\Controllers\Client\LessonController;
    use App\Http\Controllers\Client\ReviewController;
    use App\Http\Controllers\Client\StudentController;
    use App\Http\Controllers\Client\UserActionController;
    use App\Http\Controllers\Client\ViewController;
    use Illuminate\Support\Facades\Route;

    Route::prefix('/')->group(function () {
        Route::get('/', [ViewController::class, 'index'])->name('client.home');
        Route::get('/about-us', [ViewController::class, 'about'])->name('client.about');
        Route::get('/all-courses/{category?}', [CourseController::class, 'index'])->name('client.courses');
        Route::get('/course-detail/{slug}', [CourseController::class, 'show'])->name('client.course_detail');
        Route::get('/all-instructors', [InstructorController::class, 'index'])->name('client.instructors');
        Route::get('/register-instructor', [InstructorController::class, 'create'])->name('client.become_instructor');
        Route::get('/all-blogs', [BlogController::class, 'index'])->name('client.blogs');
        Route::get('/blog-detail/{slug}', [BlogController::class, 'show'])->name('client.blog_detail');
        Route::get('/not-found', [ViewController::class, 'notFound'])->name('client.404');
        Route::get('/profile/{slug}', [InstructorController::class, 'profile'])->name('instructor.profile');
    });
    Route::middleware('check.user.is.login')->group(function () {
        Route::prefix('/student')->group(function () {
            Route::get('/profile', [StudentController::class, 'dashboard'])->name('student.dashboard');
            Route::get('/info', [StudentController::class, 'info'])->name('student.show');
            Route::get('/edit-profile', [StudentController::class, 'edit'])->name('student.edit');
            Route::get('/enrolled-courses', [StudentController::class, 'myCourses'])->name('student.enrolled_courses');
        });
        Route::prefix('/course')->group(function () {
            Route::get('/{course_slug}/{subject_slug?}/{lesson_slug?}', [LessonController::class, 'index'])->name('course.index');
        });
        Route::prefix('/instructor')->middleware('check.user.is.instructor')->group(function () {
            Route::get('/my-profile', [InstructorController::class, 'dashboard'])->name('instructor.dashboard');
            Route::get('/show', [InstructorController::class, 'show'])->name('instructor.show');
            Route::get('/edit', [InstructorController::class, 'edit'])->name('instructor.edit');
            Route::get('/my-courses', [InstructorController::class, 'courses'])->name('instructor.my_courses');
            Route::get('/my-reviews', [InstructorController::class, 'reviews'])->name('instructor.my_reviews');
            Route::get('/create-course', [CourseController::class, 'create'])->name('instructor.create_course');
            Route::get('/create-blog', [BlogController::class, 'create'])->name('instructor.create_blog');
            Route::post('/update/{instructor}', [InstructorController::class, 'update'])->name('instructor.update');
            Route::post('/reset-password', [InstructorController::class, 'resetPassword'])->name('instructor.reset_password');
            Route::post('/upload_blog_thumbnail', [BlogController::class, 'storeImage'])->name('upload.blog_thumbnail');
            Route::post('/create-blog', [BlogController::class, 'store'])->name('blog.store');
            Route::post('/create-course', [CourseController::class, 'store'])->name('course.store');
            Route::delete('delete-course/{id}', [CourseController::class, 'destroy'])->name('course.destroy');
        });
        Route::resources(['/student' => StudentController::class], ['as' => 'client']);
        Route::post('like/{id}/{type}', [UserActionController::class, 'handleLikeAction'])->name('client.like');
        Route::post('dislike/{id}/{type}', [UserActionController::class, 'handleDislikeAction'])->name('client.dislike');
        Route::post('/upload-avatar', [UserActionController::class, 'handleUploadAvatar'])->name('upload.avatar');
        Route::post('/upload-tmp-avatar', [UserActionController::class, 'uploadTmpAvatar'])->name('upload.tmp.avatar');
        Route::delete('/delete-tmp-avatar', [UserActionController::class, 'deleteTmpAvatar'])->name('delete.tmp.avatar');
        Route::prefix('cart')->group(function () {
            Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
            Route::post('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
            Route::post('/place-order', [CartController::class, 'placeOrder'])->name('cart.placeholder');
        });
        Route::get('vnpay/callback', [CartController::class, 'vnpayCallback'])->name('vnpay.callback');
        Route::post('/comment/{commentable_id?}/{type?}', [CommentController::class, 'store'])->name('client.comment');
        Route::post('review/{reviewable_type}/{reviewable_id?}', [ReviewController::class, 'store'])->name('client.review.store');
        Route::delete('review/{id}', [ReviewController::class, 'destroy'])->name('client.review.destroy');
        Route::delete('comment/{id}', [CommentController::class, 'destroy'])->name('client.comment.destroy');
    });

    Route::get('/google/redirect', [GoogleLoginController::class, 'redirect'])->name('client.google.redirect');
    Route::get('/google/callback', [GoogleLoginController::class, 'callback'])->name('client.google.callback');
    Route::get('/facebook/redirect', [FacebookController::class, 'redirect'])->name('client.facebook.redirect');
    Route::get('/facebook/callback', [FacebookController::class, 'callback'])->name('client.facebook.callback');
    Route::post('instructor/register', [InstructorController::class, 'store'])->name('client.instructor.register');
