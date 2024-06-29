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
            if (Hash::check(request()->password, $user->password)) {
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

    public function getuser()
    {
        return view('admin.getuser');
    }
    public function getusertable(Request $request)
    {
        $data = User::query();
        // Filter berdasarkan pencarian
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
                // Tambahkan tombol aksi lainnya sesuai kebutuhan
                return $action.'  '.$edit;
            })
            ->rawColumns(['status','action'])
            ->toJson();
        return $result;
    }
}
