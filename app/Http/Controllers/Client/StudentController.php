<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Enrollment;
use App\Models\Review;
use App\Models\Student;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('client.pages.students.pages.profile');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $student_info = Auth::user()->student;
        return view('client.pages.students.pages.edit', compact('student_info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request, Student $student): RedirectResponse
    {
        try {
            $user = Auth::user();
            $student = Student::where('id', $student->id)->first();
            if ($request->name != Auth::user()->students->name) {
                $student->name = $request->name;
                $user->name = $request->name;
            }
            if (!is_null($request->nickname) || $request->nickname != Auth::user()->students->nickname) {
                $student->nickname = $request->nickname;
            }
            if (!is_null( $request->phone_number) || $request->phone_number != Auth::user()->students->phone_number) {
                $student->phone_number = $request->phone_number;
            }
            if (!is_null($request->dob) || $request->dob != Auth::user()->students->dob) {
                $student->dob = $request->dob;
            }
            if (!is_null($request->bio) || $request->bio != Auth::user()->students->bio) {
                $student->bio = $request->bio;
            }
            if (!is_null($request->facebook) || $request->facebook != Auth::user()->students->facebook) {
                $student->facebook = $request->facebook;
            }
            if (!is_null($request->linkedin) || $request->linkedin != Auth::user()->students->linkedin) {
                $student->linkedin = $request->linkedin;
            }
            if (!is_null($request->github) || $request->github != Auth::user()->students->github) {
                $student->github = $request->github;
            }
            $student->save();
            session()->flash('message', 'Cập nhật thông tin thành công!');
            session()->flash('icon', 'success');
        }
        catch (\Exception $e) {
            session()->flash('error_msg', 'Lỗi xảy ra! Vui lòng thử lại!');
            session()->flash('icon', 'error');
        }
        return redirect()->back();
    }

    /**
     * Show student dashboard.
     */
    public function dashboard(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        //Get enrolled courses count
        $enrollmentCount = Auth::user()->student->courses->count();
        return view('client.pages.students.pages.index', compact('enrollmentCount'));
    }

    /**
     * Show student info.
     */
    public function info(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('client.pages.students.pages.profile');
    }

    /**
     * Show student courses.
     */
    public function myCourses(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $enrolledCourses = Auth::user()->student->courses()->with(['course', 'course.reviews', 'course.subjects', 'course.students'])->where('status', 'paid')->get();
        return view('client.pages.students.pages.enrolled_courses', compact('enrolledCourses'));
    }
}
