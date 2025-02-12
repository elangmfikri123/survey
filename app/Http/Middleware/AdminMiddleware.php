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
        $user = Auth::user();
        Log::info('Middleware admin, User:', ['user' => $user]);

        if ($user && $user->roles == 'admin') {
            return $next($request);
        }
        if (session('guard') === 'era') {
            return redirect('korlapmd');
        }

        Log::warning('Middleware admin gagal: Level tidak sesuai atau user tidak ditemukan');
        return redirect('/');
    }
}
