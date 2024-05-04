<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use App\Models\Lesion;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $comments = \App\Models\Comment::where('commentable_id', $lesson->id)->where('commentable_type', 'lesson')->get();
        foreach ($comments as $comment) {
            $like_amount = \App\Models\Like::where('likeable_type', 'comment')->where('likeable_id', $comment->id)->count();
            $dislike_amount = \App\Models\Dislike::where('dislikeable_type', 'comment')->where('dislikeable_id', $comment->id)->count();
            $comment->setAttribute('like_amount', $like_amount);
            $comment->setAttribute('dislike_amount', $dislike_amount);
            $replies = \App\Models\Comment::where('commentable_id', $comment->id)->where('commentable_type', 'comment')->get();
            foreach ($replies as $reply) {
                $like_amount = \App\Models\Like::where('likeable_type', 'comment')->where('likeable_id', $reply->id)->count();
                $dislike_amount = \App\Models\Dislike::where('dislikeable_type', 'comment')->where('dislikeable_id', $reply->id)->count();
                $reply->setAttribute('like_amount', $like_amount);
                $reply->setAttribute('dislike_amount', $dislike_amount);
            }
            $comment->setAttribute('replies', $replies);
        }
        return view('client.pages.students.pages.lesson', compact('course', 'lesson', 'comments'));
    }
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();
        try {
            $course = new Course();
            $course->title = $request->course_title;
            $course->slug = Str::slug($request->course_title);
            $course->price = $request->price;
            $course->description = $request->description;
            $course->course_category_id = $request->category;
            $course->status = 'pending';
            $course->instructor_id = Auth::user()->instructors->id;
            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $fileName = $this->saveImageToSystem($file);
                $url = '/client_assets/images/tmp/' . $fileName;
                $file->move(public_path('client_assets/images/tmp/'), $fileName);
                $course->thumbnail = $url;
            }
            $course->save();
            foreach ($request->subjects as $key => $item) {
                $subject = new Subject();
                $subject->title = $item['name'];
                $subject->slug = Str::slug($item['name']);
                $subject->order = $key;
                $subject->course_id = $course->id;
                $subject->save();
                foreach ($item['lessons'] as $k => $value) {
                    $lesson = new Lesion();
                    $lesson->title  = $value['name'];
                    $lesson->slug = Str::slug($value['name']);
                    $lesson->content = $value['content'];
                    $lesson->video = $value['video'] ?? null;
                    $lesson->resource = $value['resource'] ?? null;
                    if (isset($value['is_preview'])) {
                        $is_preview = true;
                    } else {
                        $is_preview = false;
                    }
                    $lesson->is_preview = $is_preview;
                    $lesson->subject_id = $subject->id;
                    $lesson->order = $k;
                    $lesson->save();
                }
            }
            DB::commit();
            return redirect()->back()->with('msg', 'Khóa học của bạn đã được gửi đi, vui lòng chờ xác nhận')->with('i', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->with('msg', 'Tạo khóa học thất bại')->with('i', 'error');
        }
    }
    private function saveImageToSystem(UploadedFile $file): string
    {
        $originName = $file->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        return $fileName . '_' . uniqid() . '.' . $extension;
    }
}
