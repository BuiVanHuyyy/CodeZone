<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendMailNoticeToInstructorEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use App\Mail\NoticeInstructorAboutStatusAccount;
use App\Models\Course;
use App\Models\Dislike;
use App\Models\Instructor;
use App\Models\Like;
use App\Models\Review;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $status = $request->status ?? null;
        if (!is_null($status)) {
            $instructors = Instructor::whereHas('user', function ($query) use ($status) {
                $query->where('status', $status);
            })->get();
        } else {
            $instructors = Instructor::with('user')->get();
        }
        return view('admin.pages.instructor_list', compact('instructors', 'status'));
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
    public function show(Instructor $instructor): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $reviews = Review::where('reviewable_id', $instructor->id)->where('reviewable_type', 'instructor')->get();
        foreach ($reviews as $review) {
            $like_count = Like::where('likeable_type', 'review')->where('likeable_id', $review->id)->count();
            $dislike_count = Dislike::where('dislikeable_type', 'review')->where('dislikeable_id', $review->id)->count();
            $review->setAttribute('like_count', $like_count);
            $review->setAttribute('dislike_count', $dislike_count);
        }
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
            $user->password = Hash::make($tmp_password);
            $user->save();
            $instructor->setAttribute('tmp_password', $tmp_password);
            DB::commit();
            event( new SendMailNoticeToInstructorEvent($instructor));
            return response()->json(['status' => 'success', 'msg' => 'Cập nhật trạng thái thành công']);
        }
        catch (\Exception $e){
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Cập nhật trạng thái thất bại']);
        }
    }
}
