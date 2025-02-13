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
        if (session('guard') !== 'era') {
            return redirect('/');
        }

        $user = Auth::guard('era')->user();
        if ($user && $user->level == 'korlap') {
            view()->share('nama', $user->nama);
            return $next($request);
        }

        return redirect('/');
    }
}
