<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserIsInstructor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            session()->flash('login_required', 'Vui lòng đăng nhập trước!');
            return redirect()->route('login');
        }
        if (Auth::user()->role != 'instructor') {
            session()->flash('message', 'Bạn không có quyền truy cập!');
            session()->flash('icon', 'error');
            return redirect()->route('client.home');
        }
        return $next($request);
    }
}
