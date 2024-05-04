<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        return view('client.blog.index');
    }
    public function store(StoreBlogRequest $request): RedirectResponse
    {
        DB::beginTransaction();
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
            DB::commit();
        }
        catch (\Exception $e) {
            DB::rollBack();
            return back()->with('message', 'Something went wrong');
        }
        return redirect()->route('instructor.profile')->with('message', 'Blog của bạn đã được gửi đên admin và đang chờ phê duyệt');
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
