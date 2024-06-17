<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function store(Request $request, string $commentable_id, string $type): RedirectResponse
    {
        try {
            if($type == 'blog') {
                $type = 'App\Models\Blog';
            } elseif ($type == 'comment') {
                $type = 'App\Models\Comment';
            } else {
              $type = 'App\Models\Lesson';
            }
            $comment = new Comment();
            $comment->id = Str::uuid();;
            $comment->content = $request->comment_content;
            $comment->user_id = Auth::id();
            $comment->commentable_id = Crypt::decrypt($commentable_id);
            $comment->commentable_type = $type;
            $comment->save();
            session()->flash('message', 'Thêm bình luận thành công');
            session()->flash('icon', 'success');
        }catch (\Exception $e) {
            session()->flash('message', 'Có lỗi xảy ra, vui lòng thử lại sau');
            session()->flash('icon', 'error');
        }
        return redirect()->back();
    }
    public function destroy(string|int $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $comment = Comment::find(Crypt::decrypt($id));
            foreach ($comment->likes as $like) {
                $like->forceDelete();
            }
            foreach ($comment->dislikes as $dislike) {
                $dislike->forceDelete();
            }
            $comment->forceDelete();
            DB::commit();
            session()->flash('message', 'Xóa bình luận thành công');
            session()->flash('icon', 'success');
        }catch (\Exception $e) {
            DB::rollBack();
            session()->flash('message', 'Có lỗi xảy ra, vui lòng thử lại sau');
            session()->flash('icon', 'error');
        }
        return redirect()->back();
    }
}
