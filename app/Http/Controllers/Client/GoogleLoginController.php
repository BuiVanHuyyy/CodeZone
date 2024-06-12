<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function redirect(): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();
        try {

            $googleUser = Socialite::driver('google')->stateless()->user();
            if (User::where('email', $googleUser->getEmail())->exists()) {
                $user = User::where('email', $googleUser->getEmail())->first();
                Auth::login($user);
                if (Auth::user()->role == 'admin') {
                    return redirect()->route('admin.dashboard');
                }
                return redirect(RouteServiceProvider::HOME);
            }
            $user = new User();
            $user->email = $googleUser->getEmail();
            $user->name = $googleUser->getName();
            $user->password = Hash::make('code_zone' . $googleUser->getId());
            $user->role = 'student';
            $user->status = 'active';
            $user->save();
            $student = new Student();
            $student->user_id = $user->id;
            $student->name = $googleUser->getName();
            $student->slug = Str::slug($googleUser->getName());
            $student->nickname = $googleUser->getNickname();
            $student->avatar = $googleUser->getAvatar();
            $student->save();

            Auth::login($user);
            DB::commit();
        }
        catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error_msg', 'Lỗi xảy ra! Vui lòng thử lại!');
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
