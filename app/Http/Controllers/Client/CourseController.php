<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(string $course_slug, string $subject_slug = null, string $lesson_slug = null): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $course = Course::where('slug', $course_slug)->first();
        if (is_null($subject_slug)) {
            $subject_slug = $course->subjects()->orderBy('order')->first()->slug;
        }
        if (is_null($lesson_slug)) {
            $lesson_slug = $course->subjects()->where('slug', $subject_slug)->first()->lessons()->orderBy('order')->first()->slug;
        }
        $lesson = \App\Models\Lesion::where('slug', $lesson_slug)->first();
        $comments = \App\Models\Comment::where('commentable_id', $lesson->id)->where('commentable_type', 'lesion')->get();
        foreach ($comments as $comment) {
            $like_amount = \App\Models\Like::where('likeable_type', 'comment')->where('likeable_id', $comment->id)->count();
            $dislike_amount = \App\Models\Dislike::where('dislikeable_type', 'comment')->where('dislikeable_id', $comment->id)->count();
            $replies = \App\Models\Comment::where('commentable_id', $comment->id)->where('commentable_type', 'comment')->get();
            foreach ($replies as $reply) {
                $like_amount = \App\Models\Like::where('likeable_type', 'comment')->where('likeable_id', $reply->id)->count();
                $dislike_amount = \App\Models\Dislike::where('dislikeable_type', 'comment')->where('dislikeable_id', $reply->id)->count();
                $reply->setAttribute('like_amount', $like_amount);
                $reply->setAttribute('dislike_amount', $dislike_amount);
            }
            $comment->setAttribute('like_amount', $like_amount);
            $comment->setAttribute('dislike_amount', $dislike_amount);
            $comment->setAttribute('replies', $replies);
        }
        return view('client.pages.students.pages.lesson', compact('course', 'lesson', 'comments'));
    }
}
