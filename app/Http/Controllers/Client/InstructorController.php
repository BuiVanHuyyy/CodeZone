<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInstructorRequest;
use App\Http\Requests\UpdateInstructorRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Instructor;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use \Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    public function store(StoreInstructorRequest $request): \Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = \Illuminate\Support\Facades\Hash::make('my-secret-password');
            $user->role = 'instructor';
            $user->save();
            $instructor = new Instructor();
            $instructor->user_id = $user->id;
            $instructor->name = $request->name;
            $instructor->slug = Str::slug($request->name);
            $instructor->phone_number = $request->phone;
            $instructor->bio = $request->bio;
            $instructor->cv_upload = $this->saveCvToSystem($request->cv);
            $instructor->save();
            DB::commit();
            return redirect()->back()->with('msg', 'Chúng tôi đã nhận được yều cầu của bạn chúng tôi sẽ phản hồi sớm nhất có thể')->with('i', 'success');
        }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('msg', 'Register failed')->with('i', 'error');
        }
    }
    private function saveCvToSystem(UploadedFile $file): string
    {
        $originName = $file->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileName = $fileName . '_' . uniqid() . '.' . $extension;
        $file->move(public_path('client_assets/cv_instructor'), $fileName);
        return '/client_assets/cv_instructor/' . $fileName;
    }
    public function update(Request $request, Instructor $instructor): \Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();
        try {
            $user = Auth::user();
            if ($request->name != Auth::user()->instructors->name) {
                $instructor->name = $request->name;
                $user->name = $request->name;
            }
            if (!is_null($request->nickname) || $request->nickname != Auth::user()->instructors->nickname) {
                $instructor->nickname = $request->nickname;
            }
            if (!is_null( $request->phone_number) || $request->phone_number != Auth::user()->instructors->phone_number) {
                $instructor->phone_number = $request->phone_number;
            }
            if (!is_null($request->dob) || $request->dob != Auth::user()->instructors->dob) {
                $instructor->dob = $request->dob;
            }
            if (!is_null($request->bio) || $request->bio != Auth::user()->instructors->bio) {
                $instructor->bio = $request->bio;
            }
            if (!is_null($request->facebook) || $request->facebook != Auth::user()->instructors->facebook) {
                $instructor->facebook = $request->facebook;
            }
            if (!is_null($request->linkedin) || $request->linkedin != Auth::user()->instructors->linkedin) {
                $instructor->linkedin = $request->linkedin;
            }
            if (!is_null($request->github) || $request->github != Auth::user()->instructors->github) {
                $instructor->github = $request->github;
            }
            $instructor->save();
            DB::commit();
            session()->flash('message', 'Cập nhật thông tin thành công!');
            session()->flash('icon', 'success');
        }
        catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error_msg', 'Lỗi xảy ra! Vui lòng thử lại!');
            session()->flash('icon', 'error');
        }
        return redirect()->back();
    }
    public function uploadAvatar(Request $request, Instructor $instructor)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = $this->saveImageToSystem($file);
            //Delete old avatar
            if ($instructor->avatar) {
                $oldAvatarPath = public_path($instructor->avatar);
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
            $file->move(public_path('client_assets/images/avatar/'), $fileName);
            $url = '/client_assets/images/avatar/' . $fileName;

            $instructor->avatar = $url;
            $instructor->save();
            return redirect()->back();
        }
    }
    public function resetPassword(UpdatePasswordRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
        if (!Hash::check($request->old_password, $user->password)) {
            session()->flash('msg', 'Mật khẩu cũ không chính xác!');
            session()->flash('i', 'error');
            return back();
        }
        $user->password = Hash::make($request->password);
        $user->save();

        session()->flash('msg', 'Đổi mật khẩu thành công!');
        session()->flash('i', 'success');
        return back();
    }
    private function saveImageToSystem(UploadedFile $file): string
    {
        $originName = $file->getClientOriginalName();
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        return $fileName . '_' . uniqid() . '.' . $extension;
    }

}
