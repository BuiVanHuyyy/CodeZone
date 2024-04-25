<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function store(StoreReviewRequest $request, string $reviewable_type, int|string $reviewable_id)
    {
        DB::beginTransaction();
        try {
            $review = new Review();
            $review->rating = $request->rating;
            $review->content = $request->review_content;
            $review->reviewable_id = $reviewable_id;
            $review->reviewable_type = $reviewable_type;
            $review->user_id = Auth::id();
            $review->save();
            DB::commit();
            return redirect()->back()->with('msg', 'Thêm review thành công')->with('i', 'success');
        }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('msg', 'Thêm review thất bại')->with('i', 'error');
        }
    }
    public function destroy(int|string $id): \Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();
        try {
            $review = Review::find($id);
            if (Auth::id() != $review->user_id) {
                return redirect()->back()->with('msg', 'Bạn không có quyền xóa review này')->with('i', 'error');
            }
            $review->delete();
            DB::commit();
            return redirect()->back()->with('msg', 'Xóa review thành công')->with('i', 'success');
        }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('msg', 'Xóa review thất bại')->with('i', 'error');
        }
    }
}
