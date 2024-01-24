<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function storeLogin()
    {
        $credentials = request()->only('email', 'username');
        $user = User::where($credentials)->first();
    
        if ($user) {
            if (md5(request()->password) === $user->password) {
                if ($user->roles == 'admin') {
                    Auth::login($user);
                    return redirect('admin')->with('status', 'Berhasil Login.');
                } else {
                    Auth::login($user);
                    return redirect('user')->with('status', 'Berhasil Login.');
                }
            } else {
                return redirect('/')->with('message', 'Password salah');
            }
        }
    
        return redirect('/')->with('message', 'Akun tidak ditemukan');
    }

    public function logout()
    {
        $user = request()->user();
        Auth::logout($user);
        return redirect('/');
    }
}
