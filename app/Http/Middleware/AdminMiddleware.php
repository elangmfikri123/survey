<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        Log::info('Middleware admin, User:', ['user' => Auth::user()]);
        if (Auth::check() && Auth::user()->roles == 'admin') {
            return $next($request);
        }

        Log::warning('Middleware admin gagal: Level tidak sesuai atau user tidak ditemukan');
        return redirect('/');
    }
}
