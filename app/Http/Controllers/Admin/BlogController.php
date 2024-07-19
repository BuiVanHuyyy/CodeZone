<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Blog;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Mockery\Exception;

    class BlogController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index(Request $request): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            $status = $request->status ?? null;
            if (!is_null($status)) {
                $blogs = Blog::with('author')->where('status', $status)->get();
            } else {
                $blogs = Blog::with('author')->withTrashed()->get();
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
        public function show(string $slug): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
        {
            $blog = Blog::withTrashed()->where('slug', $slug)->first();
            if (!$blog) {
                return view('admin.pages.404admin');
            }
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

        public function updateStatus(string $id, Request $request): JsonResponse
        {
            DB::beginTransaction();
            try {
                $blog = Blog::where('id', decrypt($id))->withTrashed()->first();
                if ($request->status == 'rejected') {
                    $this->destroy($id);
                } elseif ($request->status == 'approved') {
                    if ($this->moveFileFormTmpToBlogFolder($blog->thumbnail)) {
                        $content = $blog->content;
                        preg_match_all('/<img[^>]+src="([^">]+)"/i', $content, $matches);
                        $imageUrls = $matches[1];
                        foreach ($imageUrls as $url) {
                            $fileName = basename($url);
                            if ($this->moveFileFormTmpToBlogFolder($fileName)) {
                                $newUrl = env('BLOG_FOLDER_PATH') . $fileName;
                                $content = str_replace($url, url($newUrl), $content);
                            }
                        }
                        $blog->content = $content;
                    }
                }
                $blog->status = $request->status;
                $blog->save();
                DB::commit();
//            event(new SendMailNotiveBlogEvent($blog));
                return response()->json(['status' => 'success', 'msg' => 'Cập nhật trạng thái thành công'], 200);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['status' => 'error', 'msg' => 'Cập nhật trạng thái thất bại'], 500);
            }
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id): JsonResponse
        {
            try {
                $blog = Blog::find(decrypt($id));
                $slug = $blog->slug;
                $blogThumbnailPath = public_path(env('BLOG_FOLDER_PATH') . $blog->thumbnail);
                $blogTmpThumbnailPath = public_path(env('TMP_FOLDER_PATH') . $blog->thumbnail);
                if (file_exists($blogThumbnailPath)) {
                    unlink($blogThumbnailPath);
                } elseif (file_exists($blogTmpThumbnailPath)) {
                    unlink($blogTmpThumbnailPath);
                }
                $content = $blog->content;
                preg_match_all('/<img[^>]+src="([^">]+)"/i', $content, $matches);
                $imageUrls = $matches[1];
                foreach ($imageUrls as $url) {
                    $filePath = public_path(str_replace(url('/'), '', $url));
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
                foreach ($blog->comments as $comment) {
                    foreach ($comment->replies as $reply) {
                        foreach ($reply->likes as $like) {
                            $like->forceDelete();
                        }
                        foreach ($reply->dislikes as $dislike) {
                            $dislike->forceDelete();
                        }
                        $reply->forceDelete();
                    }
                    foreach ($comment->likes as $like) {
                        $like->forceDelete();
                    }
                    foreach ($comment->dislikes as $dislike) {
                        $dislike->forceDelete();
                    }
                    $comment->forceDelete();
                }
                foreach ($blog->likes as $like) {
                    $like->forceDelete();
                }
                foreach ($blog->dislikes as $dislike) {
                    $dislike->forceDelete();
                }
                $blog->forceDelete();
                return response()->json(['msg' => 'Xóa bài viết thành công', 'slug' => $slug], 200);
            } catch (Exception $e) {
                return response()->json(['msg' => 'Đã có lỗi xảy ra, vui lòng thử lại'], 500);
            }
        }

        private function moveFileFormTmpToBlogFolder(string $fileName): bool
        {
            $tmpPath = public_path(env('TMP_FOLDER_PATH')) . $fileName;
            $blogPath = public_path(env('BLOG_FOLDER_PATH')) . $fileName;

            return (file_exists($tmpPath) && rename($tmpPath, $blogPath));
        }
    }
