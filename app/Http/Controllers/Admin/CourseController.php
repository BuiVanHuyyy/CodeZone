<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendMailNoticeCourseEvent;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Dislike;
use App\Models\Like;
use App\Models\Review;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $status = $request->status ?? null;
        if (!is_null($status)) {
            $courses = Course::where('status', $status)->get();
        } else {
            $courses = Course::with('reviews')->withTrashed()->get();
        }
        return view('admin.pages.courses_list', compact('courses', 'status'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $course = Course::find($id);
        $reviews = Review::where('reviewable_id', $id)->where('reviewable_type', 'course')->get();
        $reviews->map(function ($review) {
            $likeAmount = Like::where('likeable_type', 'review')->where('likeable_id', $review->id)->count();
            $dislikeAmount = Dislike::where('dislikeable_type', 'review')->where('dislikeable_id', $review->id)->count();
            $review->setAttribute('like_amount', $likeAmount);
            $review->setAttribute('dislike_amount', $dislikeAmount);
            return $review;
        });
        $totalStars = 0;
        foreach($reviews as $review) {
            $totalStars += $review->rating;
        }
        if (count($reviews) > 0) {
            $rating = $totalStars / count($reviews);
        } else {
            $rating = 0;
        };
        return view('admin.pages.course_detail', compact('course', 'reviews', 'rating'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        DB::beginTransaction();
        try {
            $course = Course::find($id);
            if (file_exists(public_path($course->thumbnail))) {
                unlink(public_path($course->thumbnail));
            }
            foreach ($course->subjects as $subject) {
                foreach ($subject->lessons as $lesson) {
                    $lesson->forceDelete();
                }
                $subject->forceDelete();
            }
            $course->forceDelete();
            DB::commit();
            return response()->json(['status' => 'success', 'msg' => 'Xóa khóa học thành công']);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Xóa khóa học thất bại']);
        }
    }
    public function updateStatus(int|string $id, Request $request): \Illuminate\Http\JsonResponse
    {
        DB::beginTransaction();
        try {
            $course = Course::withTrashed()->find($id);
            if ($request->status == 'rejected') {
                $course->delete();
            }else {
                $course->deleted_at = null;
            }
            $course->status = $request->status;
            $course->save();
            DB::commit();
            event(new SendMailNoticeCourseEvent($course));
            return response()->json(['status' => 'success', 'msg' => 'Cập nhật trạng thái thành công']);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Cập nhật trạng thái thất bại']);
        }
    }
}
