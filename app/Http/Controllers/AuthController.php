<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserEra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function storeLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        Auth::logout();
        Auth::guard('era')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        Log::info('Mencoba login dengan username:', ['username' => $username]);

        $userSurvey = User::where('username', $username)->first();
        if ($userSurvey) {
            Log::info('User ditemukan di survey_cc:', ['username' => $userSurvey->username]);

            if (Hash::check($password, $userSurvey->password)) {
                Log::info('Password cocok untuk survey_cc');
                Auth::login($userSurvey);
                session(['guard' => 'web']);
                return redirect($userSurvey->roles == 'admin' ? 'admin' : 'user')->with('status', 'Berhasil Login.');
            } else {
                Log::warning('Password salah untuk survey_cc');
            }
        }

        $userEra = UserEra::where('username', $username)->first();
        if ($userEra) {
            Log::info('User ditemukan di era:', ['username' => $userEra->username]);

            $hashedPassword = md5($password);
            Log::info('Password input (MD5):', ['input' => $hashedPassword]);
            Log::info('Password database:', ['stored' => $userEra->password]);

            if ($hashedPassword === $userEra->password) {
                Log::info('Password cocok untuk user di era');

                Auth::guard('era')->login($userEra);
                session(['guard' => 'era']);

                if ($userEra->level == 'korlap') {
                    return redirect('korlapmd')->with('status', 'Berhasil Login.');
                } elseif ($userEra->level == 'mekanik') {
                    return redirect('mekanik')->with('status', 'Berhasil Login.');
                }

                Log::warning('Level user tidak dikenali:', ['level' => $userEra->level]);
                return redirect('/')->with('message', 'Level tidak dikenali.');
            } else {
                Log::warning('Password salah untuk era');
            }
        }

        Log::warning('Akun tidak ditemukan atau password salah.');
        return redirect('/')->with('message', 'Akun tidak ditemukan atau password salah.');
    }

    public function logout()
    {
        if (session('guard') === 'era') {
            Auth::guard('era')->logout();
        } else {
            Auth::logout();
        }
    
        session()->flush();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function getuser()
    {
        return view('admin.getuser');
    }
    public function getusertable(Request $request)
    {
        $data = User::query();
        if ($request->has('search') && !empty($request->search['value'])) {
            $search = $request->search['value'];
            $data->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('nama', 'like', '%' . $search . '%')
                    ->orWhere('username', 'like', '%' . $search . '%')
                    ->orWhere('roles', 'like', '%' . $search . '%');
            });
        }
        $result = DataTables()->of($data)
            ->addColumn('status', function ($row) {
                $badgeClass = $row->status == 'Belum Terisi' ? 'badge-warning' : 'badge-success';
                return '<span class="badge ' . $badgeClass . '">' . $row->status . '</span>';
            })
            ->addColumn('action', function ($row) {
                $action = '<a href="' . url('/survey-awarenesshc/data/' . $row->id) . '" class="btn btn-sm btn-primary">Detail</a>';
                $edit = '<a href="' . url('/survey-awarenesshc/data/' . $row->id) . '" class="btn btn-sm btn-warning">Edit</a>';
                return $action . '  ' . $edit;
            })
            ->rawColumns(['status', 'action'])
            ->toJson();
        return $result;
    }
    public function getuserera()
    {
        return view('admin.getuserera');
    }
    public function usereratable(Request $request)
    {
        $data = UserEra::query();
        // Filter berdasarkan pencarian
        if ($request->has('search') && !empty($request->search['value'])) {
            $search = $request->search['value'];
            $data->where(function ($query) use ($search) {
                $query->where('id_user', 'like', '%' . $search . '%')
                    ->orWhere('nama', 'like', '%' . $search . '%')
                    ->orWhere('username', 'like', '%' . $search . '%')
                    ->orWhere('level', 'like', '%' . $search . '%')
                    ->orWhere('kode', 'like', '%' . $search . '%');
            });
        }
        $result = DataTables()->of($data)
            ->addColumn('status', function ($row) {
                $badgeClass = $row->status == 'Tidak Aktif' ? 'badge-warning' : 'badge-success';
                return '<span class="badge ' . $badgeClass . '">' . $row->status . '</span>';
            })
            ->addColumn('action', function ($row) {
                $action = '<a href="' . url('/survey-awarenesshc/data/' . $row->id) . '" class="btn btn-sm btn-primary">Detail</a>';
                $edit = '<a href="' . url('/survey-awarenesshc/data/' . $row->id) . '" class="btn btn-sm btn-warning">Edit</a>';
                return $action . '  ' . $edit;
            })
            ->rawColumns(['status', 'action'])
            ->toJson();
        return $result;
    }
}
