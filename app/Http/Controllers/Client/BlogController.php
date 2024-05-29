<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Models\Blog;
use App\Models\Dislike;
use App\Models\Like;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $blogs = Blog::where('status', 'approved')->get();
        return view('client.pages.all_blogs', compact('blogs'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $blog = Blog::where('slug', $slug)->first();
        if (!$blog) {
            return view('client.pages.404');
        }
        //Share component
        $shareComponent = \Share::page(url(url('/blog-detail/' . $blog->slug)), $blog->title)->facebook()->linkedin()->whatsapp()->twitter();
        //Check current user liked or disliked this blog
        if(Auth::check()) {
            $blog->setAttribute('is_liked', Like::where('likeable_type', 'blog')->where('likeable_id', $blog->id)->where('user_id', Auth::id())->count() > 0);
            $blog->setAttribute('is_disliked', Dislike::where('dislikeable_type', 'blog')->where('dislikeable_id', $blog->id)->where('user_id', Auth::id())->count() > 0);
        }
        $comments = $blog->comments;
        foreach ($comments  as $comment) {
            $comment->setAttribute('replies', \App\Models\Comment::where('commentable_id', $comment->id)->where('commentable_type', 'App\Models\Comment')->get());
            if (Auth::check()) {
                $comment->setAttribute('is_liked', Like::where('likeable_type', 'comment')->where('likeable_id', $comment->id)->where('user_id', Auth::id())->count() > 0);
                $comment->setAttribute('is_disliked', Dislike::where('dislikeable_type', 'comment')->where('dislikeable_id', $comment->id)->where('user_id', Auth::id())->count() > 0);
            }
            if ($comment->replies->count() > 0) {
                foreach ($comment->replies as $reply) {

                    if (Auth::check()) {
                        $reply->setAttribute('is_liked', Like::where('likeable_type', 'comment')->where('likeable_id', $reply->id)->where('user_id', Auth::id())->count() > 0);
                        $reply->setAttribute('is_disliked', Dislike::where('dislikeable_type', 'comment')->where('dislikeable_id', $reply->id)->where('user_id', Auth::id())->count() > 0);
                    }
                }
            }
        }
        return view('client.pages.blog_detail', compact('blog','comments', 'shareComponent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request): RedirectResponse
    {
        try {
            $blog = new Blog();
            $blog->title = $request->blog_title;
            $blog->slug = Str::slug($request->blog_title);
            $blog->content = $request->blog_content;
            $blog->thumbnail = $this->saveImageToSystem($request->file('thumbnail'));
            $blog->user_id = Auth::id();
            $blog->status = 'pending';
            $blog->summary = $request->blog_summary;
            $blog->save();
            return redirect()->route('instructor.profile')->with('message', 'Blog của bạn đã được gửi đên admin và đang chờ phê duyệt');
        }
        catch (\Exception $e) {
            return back()->with('message', 'Something went wrong');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('client.pages.instructors.pages.create_blog');
    }
    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = $this->saveImageToSystem($file);

            $url = asset('client_assets/images/blog/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }
    private function saveImageToSystem(UploadedFile $file): string
    {
        $originName = $file->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileName = $fileName . '_' . uniqid() . '.' . $extension;

        $file->move(public_path('client_assets/images/blog'), $fileName);

        return $fileName;
    }
}
