<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use App\Mail\NoticeInstructorHasApproved;
use App\Models\Instructor;
use App\Models\Review;
use http\Client\Curl\User;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $instructors = Instructor::with('user')->get();
        return view('admin.pages.instructor_list', ['instructors' => $instructors]);
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
    public function store(StoreInstructorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $reviews = Review::where('reviewable_id', $instructor->id)->where('reviewable_type', 'instructor')->get();
        $totalStars = 0;
        foreach($reviews as $review) {
            $totalStars += $review->rating;
        }
        if (count($reviews) > 0) {
            $rating = $totalStars / count($reviews);
        } else {
            $rating = 0;
        }
        $totalStudents = 0;
        $totalIncome = 0;
        foreach($instructor->courses as $course) {
            $totalStudents += $course->students->count();
            $totalIncome += $course->students->count() * $course->price;
        }
        $instructor = Instructor::find($instructor->id);
        return view('admin.pages.instructor_detail', compact('instructor', 'reviews', 'rating', 'totalStudents', 'totalIncome'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInstructorRequest $request, Instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        //
    }
    public function updateStatus(int|string $id, \Illuminate\Http\Request $request ): \Illuminate\Http\JsonResponse
    {
        DB::beginTransaction();
        try{
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $instructor = Instructor::find($id);
            $user = $instructor->user;
            $user->status = $request->status;
            $tmp_password = substr(str_shuffle($characters), 0, 8);
            $user->password = bcrypt($tmp_password);
            $user->save();
            $instructor->setAttribute('tmp_password', $tmp_password);
            DB::commit();
            Mail::to('buivanhuy101101@gmail.com')->send(new NoticeInstructorHasApproved($instructor));
            return response()->json(['status' => 'success', 'msg' => 'Cập nhật trạng thái thành công']);
        }
        catch (\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            return response()->json(['status' => 'error', 'msg' => 'Cập nhật trạng thái thất bại']);
        }
    }
}
