<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use \App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    public function index(string $course_slug, string $subject_slug = null, string $lesson_slug = null): Application|Factory|View|\Illuminate\Foundation\Application
    {
        $course = Course::where('slug', $course_slug)->first();
        if (!$course || $course->status !== 'approved') {
            return view('client.pages.404');
        }
        if (Auth::user()->role === 'instructor') {
            if ($course->author->id !== Auth::id()) {
                return view('client.pages.404');
            }
        }
        else {
            if (!$course->students->where('status', 'paid')->contains('user_id', Auth::id())) {
                return view('client.pages.404');
            }
        }
        if (is_null($subject_slug)) {
            $subject_slug = $course->subjects()->orderBy('order')->first()->slug;
        }
        if (is_null($lesson_slug)) {
            $lesson_slug = $course->subjects()->where('slug', $subject_slug)->first()->lessons()->orderBy('order')->first()->slug;
        }
        $lesson = Lesson::where('slug', $lesson_slug)->first();
        if (!$lesson) {
            return view('client.pages.404');
        }
//        $comments = \App\Models\Comment::where('commentable_id', $lesson->id)->where('commentable_type', 'lesson')->get();
//        foreach ($comments as $comment) {
//            $like_amount = \App\Models\Like::where('likeable_type', 'comment')->where('likeable_id', $comment->id)->count();
//            $dislike_amount = \App\Models\Dislike::where('dislikeable_type', 'comment')->where('dislikeable_id', $comment->id)->count();
//            $comment->setAttribute('like_amount', $like_amount);
//            $comment->setAttribute('dislike_amount', $dislike_amount);
//            $replies = \App\Models\Comment::where('commentable_id', $comment->id)->where('commentable_type', 'comment')->get();
//            foreach ($replies as $reply) {
//                $like_amount = \App\Models\Like::where('likeable_type', 'comment')->where('likeable_id', $reply->id)->count();
//                $dislike_amount = \App\Models\Dislike::where('dislikeable_type', 'comment')->where('dislikeable_id', $reply->id)->count();
//                $reply->setAttribute('like_amount', $like_amount);
//                $reply->setAttribute('dislike_amount', $dislike_amount);
//            }
//            $comment->setAttribute('replies', $replies);
//        }
        return view('client.pages.students.pages.lesson', compact('course', 'lesson'));
    }
}
