<?php

namespace App\Http\Controllers\Admin;

use App\Events\SendMailNoticeCourseEvent;
use App\Events\SendMailNotiveBlogEvent;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Course;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = $request->status ?? null;
        if (!is_null($status)) {
            $blogs = Blog::where('status', $status)->get();
        } else {
            $blogs = Blog::withTrashed()->get();
        }
        return view('admin.pages.blog_list', compact('blogs', 'status'));
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
    public function show(string $id): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $blog = Blog::withTrashed()->find($id);
        return view('admin.pages.blog_detail', compact('blog'));
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
    public function updateStatus(int|string $id, Request $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $blog = Blog::find($id);
            if ($request->status == 'rejected') {
                $blog->delete();
            }else {
                $blog->deleted_at = null;
            }
            $blog->status = $request->status;
            $blog->save();
            DB::commit();
            event(new SendMailNotiveBlogEvent($blog));
            return response()->json(['status' => 'success', 'msg' => 'Cập nhật trạng thái thành công']);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'msg' => 'Cập nhật trạng thái thất bại']);
        }
    }
}
