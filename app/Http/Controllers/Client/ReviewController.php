<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    public function store(StoreReviewRequest $request, string $reviewable_type, int|string $reviewable_id): RedirectResponse
    {

        try {
            if($reviewable_type == 'course') {
                $reviewable_type = 'App\Models\Course';
            } elseif ($reviewable_type == 'instructor') {
                $reviewable_type = 'App\Models\Instructor';
            } else {
                return redirect()->back()->with('message', 'Đã có lỗi xảy ra, vui lòng thử lại')->with('icon', 'error');
            }
            $review = new Review();
            $review->id = Str::uuid();
            $review->rating = $request->rating;
            $review->content = $request->review_content;
            // Decrypt the reviewable_id from the request
            $review->reviewable_id = Crypt::decrypt($reviewable_id);
            $review->reviewable_type = $reviewable_type;
            $review->student_id = Auth::user()->student->id;
            $review->save();
            return redirect()->back()->with('message', 'Thêm review thành công')->with('icon', 'success');
        }
        catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('message', 'Đã có lỗi xảy ra, vui lòng thử lại')->with('icon', 'error');
        }
    }
    public function destroy(int|string $id): RedirectResponse
    {
        $review = Review::find(Crypt::decrypt($id));
        if (!$review) {
            return redirect()->route('client.404');
        }
        if (Auth::id() != $review->user_id) {
            return redirect()->back()->with('message', 'Đã có lỗi xảy ra, vui lòng thử lại')->with('icon', 'error');
        }
        $review->forceDelete();
        return redirect()->back()->with('message', 'Xóa review thành công')->with('i', 'success');
    }
}
