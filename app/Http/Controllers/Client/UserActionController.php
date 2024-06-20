<?php

    namespace App\Http\Controllers\Client;

    use App\Http\Controllers\Controller;
    use App\Models\Dislike;
    use App\Models\Like;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\UploadedFile;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Crypt;

    class UserActionController extends Controller
    {
        public function handleUploadAvatar(Request $request)
        {
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $fileName = $this->uniqueImagePath($file);
                //Delete old avatar
                if (!is_null(Auth::user()->avatar)) {
                    $oldAvatarPath = public_path(env('AVATAR_FOLDER_PATH') . Auth::user()->avatar);
                    if (file_exists($oldAvatarPath)) {
                        unlink($oldAvatarPath);
                    }
                    //use session variable to store the path of the temporary avatar
                    if (session()->has('tmp_avatar')) {
                        $tmpAvatarPath = public_path(session()->get('tmp_avatar'));
                        if (file_exists($tmpAvatarPath)) {
                            unlink($tmpAvatarPath);
                        }
                    }
                }
                //Save new avatar
                $file->move(public_path(env('avatar_folder_path')), $fileName);
                Auth::user()->avatar = $fileName;
                Auth::user()->save();
                return redirect()->back();
            }
        }

        private function uniqueImagePath(UploadedFile $file): string
        {
            $originName = $file->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            return $fileName . '_' . uniqid() . '.' . $extension;
        }

        public function uploadTmpAvatar(Request $request)
        {
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $fileName = $this->uniqueImagePath($file);
                $url = env('TMP_FOLDER') . $fileName;
                session()->put('tmp_avatar', $url);
                $file->move(public_path(env('TMP_FOLDER')), $fileName);
                return response()->json(['path' => $url]);
            }
        }

        public function deleteTmpAvatar(Request $request): JsonResponse
        {
            if ($request->has('path')) {
                $tmpAvatarPath = public_path($request->path);
                if (file_exists($tmpAvatarPath)) {
                    unlink($tmpAvatarPath);
                }
                return response()->json(['success' => true]);
            }
            return response()->json(['success' => false]);
        }

        public function handleLikeAction(int|string $id, string $type): JsonResponse|RedirectResponse
        {
            if (!Auth::check()) {
                return response()->json(['success' => true, 'message' => 'Bạn cần đăng nhập trước']);
            }
            $id = Crypt::decrypt($id);
            if ($type == 'review') {
                $type = 'App\Models\Review';
            }elseif ($type == 'blog') {
                $type = 'App\Models\Blog';
            }
            else {
                $type = 'App\Models\Comment';
            }
            $like = Like::where('user_id', Auth::id())->where('likeable_id', $id)->where('likeable_type', $type)->first();
            $dislike = Dislike::where('user_id', Auth::id())->where('dislikeable_id', $id)->where('dislikeable_type', $type)->first();
            if ($like) {
                $like->forceDelete();
            } else {
                if ($dislike) {
                    $dislike->forceDelete();
                }
                $like = new Like();
                $like->user_id = Auth::id();
                $like->likeable_id = $id;
                $like->likeable_type = $type;
                $like->save();
            }
            $like_amount = Like::where('likeable_id', $id)->where('likeable_type', $type)->count();
            $dislike_amount = Dislike::where('dislikeable_id', $id)->where('dislikeable_type', $type)->count();
            return response()->json(['success' => true, 'like_amount' => $like_amount, 'dislike_amount' => $dislike_amount]);
        }

        public function handleDislikeAction(int|string $id, string $type): JsonResponse|RedirectResponse
        {
            $id = Crypt::decrypt($id);
            if ($type == 'review') {
                $type = 'App\Models\Review';
            }elseif ($type == 'blog') {
                $type = 'App\Models\Blog';
            } else {
                $type = 'App\Models\Comment';
            }
            $dislike = Dislike::where('user_id', Auth::id())->where('dislikeable_id', $id)->where('dislikeable_type', $type)->first();
            $like = Like::where('user_id', Auth::id())->where('likeable_id', $id)->where('likeable_type', $type)->first();

            if ($dislike) {
                $dislike->forceDelete();
            } else {
                if ($like) {
                    $like->forceDelete();
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
