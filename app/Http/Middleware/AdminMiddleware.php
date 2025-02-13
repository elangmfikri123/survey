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
        if (session('guard') !== 'web') {
            return redirect('/');
        }

        $user = Auth::user();
        if ($user && $user->roles == 'admin') {
            return $next($request);
        }

        return redirect('/');
    }
}
