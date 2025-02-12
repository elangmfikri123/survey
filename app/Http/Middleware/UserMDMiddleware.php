<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UserMDMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::guard('era')->user();
        Log::info('Middleware korlapmd, User:', ['user' => $user]);

        if ($user && $user->level == 'korlap') {
            view()->share('nama', $user->nama);
            return $next($request);
        }

        Log::warning('Middleware korlapmd gagal: Level tidak sesuai atau user tidak ditemukan');
        return redirect('/');
    }
}
