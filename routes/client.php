<?php
    use \Illuminate\Support\Facades\Route;
    use \App\Http\Controllers\Client\ViewController;

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
