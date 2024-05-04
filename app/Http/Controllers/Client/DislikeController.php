<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Dislike;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DislikeController extends Controller
{
    public function store(int|string $id, string $type): \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
    {
        $dislike = Dislike::where('user_id', Auth::id())->where('dislikeable_id', $id)->where('dislikeable_type', $type)->first();
        $like = Like::where('user_id', Auth::id())->where('likeable_id', $id)->where('likeable_type', $type)->first();

        if ($dislike) {
            $dislike->delete();
        } else {
            if ($like) {
                $like->delete();
                return redirect()->back();
            }
            $dislike = new Dislike();
            $dislike->user_id = Auth::id();
            $dislike->dislikeable_id = $id;
            $dislike->dislikeable_type = $type;
            $dislike->save();
        }
        $like_amount = Like::where('likeable_id', $id)->where('likeable_type', $type)->count();
        $dislike_amount = Dislike::where('dislikeable_id', $id)->where('dislikeable_type', $type)->count();
        return response()->json(['success' => true, 'like_amount' => $like_amount, 'dislike_amount' => $dislike_amount]);
    }
}
