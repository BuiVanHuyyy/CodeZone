<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Admin\{
        CourseCategoryController,
        HandleViewController,
        InstructorController,
        CourseController,
        StudentController
    };

    Route::prefix('/admin')->middleware('check.user.is.admin')->group(function(){
        Route::get('/', [HandleViewController::class, 'dashboard'])->name('admin.dashboard');
        Route::resources([
            '/instructor' => InstructorController::class,
            '/student' => StudentController::class,
            '/course-category' => CourseCategoryController::class,
            '/course' => CourseController::class,
            ], ['as' => 'admin']);
    });
    Route::post('/update-status/{id}/{status?}', [InstructorController::class, 'updateStatus'])->name('admin.update-status');
