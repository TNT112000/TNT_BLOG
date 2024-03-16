<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('FormLogin'); // Điều hướng đến trang đăng nhập nếu chưa đăng nhập
        }
        return $next($request);
    }
}