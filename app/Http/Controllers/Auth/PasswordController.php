<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(UpdatePasswordRequest $request): RedirectResponse
    {
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->with('message', 'Mật khẩu cũ không chính xác!')->with('icon', 'error');
        }
        $request->user()->update([
            'password' => Hash::make($request['password']),
        ]);
        return back()->with('message', 'Đổi mật khẩu thành công!')->with('icon', 'success');
    }
}
