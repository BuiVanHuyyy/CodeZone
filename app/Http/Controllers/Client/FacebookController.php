<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirect(): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callback(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();
        try {
            $facebookUser = Socialite::driver('facebook')->stateless()->user();
            if (User::where('email', $facebookUser->getEmail())->exists()) {
                $user = User::where('email', $facebookUser->getEmail())->first();
                Auth::login($user);
                if (Auth::user()->role == 'admin') {
                    return redirect()->route('admin.dashboard');
                }
                return redirect(RouteServiceProvider::HOME);
            }
            $user = new User();
            $user->email = $facebookUser->getEmail();
            $user->name = $facebookUser->getName();
            $user->password = Hash::make('code_zone' . $facebookUser->getId());
            $user->role = 'student';
            $user->status = 'active';
            $user->save();
            $student = new Student();
            $student->user_id = $user->id;
            $student->name = $facebookUser->getName();
            $student->slug = Str::slug($facebookUser->getName());
            $student->nickname = $facebookUser->getNickname();
            $student->avatar = $facebookUser->getAvatar();
            $student->save();
            Auth::login($user);
            DB::commit();
        }
        catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error_msg', 'Lỗi xảy ra! Vui lòng thử lại!'. $e->getMessage());
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
