<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $students = Student::with('user')->get();
        return view('admin.pages.student_list', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        $user = User::where('slug', $slug)->first();
        if (!$user) {
            return view('admin.404');
        }
        $student = $user->student;
        return view('admin.pages.student_detail', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $student = Student::where('id', decrypt($id))->first();
        if (!$student ) {
            return response()->json(['message' => 'Đã có lỗi, vui lòng thử lại'], 500);
        }
        $slug = $student->user->slug;
        DB::beginTransaction();
        try {
            foreach ($student->courses as $course) {
                $course->delete();
            }
            $student->delete();
            $student->user->delete();
            DB::commit();
            return response()->json(['message' => 'Xóa thành công', 'row' => $slug], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Xóa thất bại'], 500);
        }

    }
}
