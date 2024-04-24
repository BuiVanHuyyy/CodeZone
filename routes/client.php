<?php
    use \Illuminate\Support\Facades\Route;
    use \App\Http\Controllers\Client\ViewController;
    use \App\Http\Controllers\Client\GoogleLoginController;
    use \App\Http\Controllers\Client\StudentController;
    use \App\Http\Controllers\Client\FacebookController;
    use \App\Http\Controllers\Client\CartController;
    use \App\Http\Controllers\Client\CourseController;

    Route::prefix('/')->group(function () {
        Route::get('/', [ViewController::class, 'index'])->name('client.home');
        Route::get('/about-us', [ViewController::class, 'about'])->name('client.about');
        Route::get('/all-courses/{category?}', [ViewController::class, 'showCourses'])->name('client.courses');
        Route::get('/course-detail/{slug}', [ViewController::class, 'showCourseDetail'])->name('client.course_detail');
        Route::get('/all-instructors', [ViewController::class, 'showInstructors'])->name('client.instructors');
        Route::get('/instructor-detail/{slug}', [ViewController::class, 'showInstructorDetail'])->name('client.instructor_detail');
        Route::get('/register-instructor', [ViewController::class, 'registerInstructor'])->name('client.become_instructor');
        Route::get('/all-blogs', [ViewController::class, 'allBlogs'])->name('client.blogs');
        Route::get('/blog-detail/{slug}', [ViewController::class, 'showBlogDetail'])->name('client.blog_detail');
    });
    Route::prefix('/student')->middleware('check.user.is.login')->group(function () {
       Route::get('/profile', [ViewController::class, 'showStudentIndex'])->name('student.profile');
       Route::get('/info', [ViewController::class, 'showStudentProfile'])->name('student.show');
       Route::get('/edit', [ViewController::class, 'showStudentEdit'])->name('student.edit');
       Route::get('/enrolled-courses', [ViewController::class, 'showEnrolledCourses'])->name('student.enrolled_courses');
    });
    Route::prefix('/course')->group(function () {
        Route::get('/{course_slug}/{subject_slug?}/{lesson_slug?}',[CourseController::class, 'index'])->name('course.index');
    });
    Route::resources(['/student' => StudentController::class], ['as' => 'client']);
    Route::prefix('/students/')->group(function () {
        Route::post('like/{id}/{type}', [StudentController::class, 'likeEvent'])->name('student.like');
        Route::post('dislike/{id}/{type}', [StudentController::class, 'dislikeEvent'])->name('student.dislike');
    });
    Route::post('/upload-avatar/{student}', [StudentController::class, 'uploadAvatar'])->name('upload.avatar');

    Route::post('/upload-tmp-avatar', [StudentController::class, 'uploadTmpAvatar'])->name('upload.tmp.avatar');
    Route::prefix('cart')->group(function () {
        Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
        Route::post('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
        Route::post('/place-order', [CartController::class, 'placeOrder'])->name('cart.placeorder');
    });
    Route::get('vnpay/callback', [CartController::class, 'vnpayCallback'])->name('vnpay.callback');

    Route::get('/google/redirect', [GoogleLoginController::class, 'redirect'])->name('client.google.redirect');
    Route::get('/google/callback', [GoogleLoginController::class, 'callback'])->name('client.google.callback');
    Route::get('/facebook/redirect', [FacebookController::class, 'redirect'])->name('client.facebook.redirect');
    Route::get('/facebook/callback', [FacebookController::class, 'callback'])->name('client.facebook.callback');
