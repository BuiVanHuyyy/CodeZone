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
        $blog = Blog::with(['author', 'comments'])->where('slug', $slug)->first();
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
        $comments = $blog->comments->sortByDesc('created_at');
        return view('client.pages.blog_detail', compact('blog','comments', 'shareComponent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request): RedirectResponse
    {
        try {
            $blog = new Blog();
            $blog->id = Str::uuid();
            $blog->title = $request->blog_title;
            $slug = Str::slug($request->blog_title);
            // Check if slug already exists
            if (Blog::where('slug', $slug)->exists()) {
                // Make slug unique if it already exists
                $slug = Str::slug($request->blog_title) . '-' . Str::random(4);
            }
            $blog->slug = $slug;
            $blog->content = $request->blog_content;
            $blog->thumbnail = $this->saveImageToSystem($request->file('thumbnail'));
            $blog->instructor_id = Auth::user()->instructor->id;
            $blog->status = 'pending';
            $blog->summary = $request->blog_summary;
            $blog->save();
            return redirect()->route('instructor.dashboard')->with('message', 'Blog của bạn đã được gửi đên admin và đang chờ phê duyệt')->with('icon', 'success');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('message', 'Something went wrong')->with('icon', 'error');
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
