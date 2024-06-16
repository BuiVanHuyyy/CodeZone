<?php

    namespace App\Http\Controllers\Client;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;
    use Illuminate\Http\UploadedFile;
    use Illuminate\Support\Facades\Auth;

    class UserActionController extends Controller
    {
        public function handleUploadAvatar(Request $request)
        {
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $fileName = $this->uniqueImagePath($file);
                //Delete old avatar
                if (!is_null(Auth::user()->avatar)) {
                    $oldAvatarPath = public_path( env('AVATAR_FOLDER_PATH') . Auth::user()->avatar);
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
        public function uploadTmpAvatar(Request $request)
        {
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $fileName = $this->uniqueImagePath($file);
                $url = env('TMP_FOLDER') . $fileName;
                session()->put('tmp_avatar', $url);
                $file->move(public_path(env('TMP_FOLDER')), $fileName);
                return response()->json(['path'  => $url]);
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
        private function uniqueImagePath(UploadedFile $file): string
        {
            $originName = $file->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            return $fileName . '_' . uniqid() . '.' . $extension;
        }
    }
