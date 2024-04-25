<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(Request $request, string $commentable_id, string $type): \Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();
        try {
            $commentable = null;
            if ($type === 'comment') {
                $commentable = \App\Models\Comment::find($commentable_id);
            }
            $comment = new Comment();
            $comment->content = $request->comment_content;
            $comment->user_id = Auth::id();
            $comment->commentable_id = $commentable->id ?? $commentable_id;
            $comment->commentable_type = $type;
            $comment->save();
            DB::commit();
            session()->flash('msg', 'Thêm bình luận thành công');
            session()->flash('i', 'success');
        }catch (\Exception $e) {
            DB::rollBack();
            session()->flash('msg', 'Có lỗi xảy ra, vui lòng thử lại sau');
            session()->flash('i', 'error');
        }
        return redirect()->back();
    }
}
