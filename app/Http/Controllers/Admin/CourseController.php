<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Dislike;
use App\Models\Like;
use App\Models\Review;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $courses = Course::all();
        return view('admin.pages.courses_list', compact('courses'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
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
        $likeAmount = Like::where('likeable_type', 'course')->where('likeable_id', $id)->count();
        $dislikeAmount = Dislike::where('dislikeable_type', 'course')->where('dislikeable_id', $id)->count();
        return view('admin.pages.course_detail', compact('course','dislikeAmount', 'likeAmount', 'reviews', 'rating'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
