<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use App\Models\Instructor;
use App\Models\Review;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $instructors = Instructor::all();
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
}
