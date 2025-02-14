<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FormEra;
use App\Models\UserEra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HondaCareController extends Controller
{
    public function getera()
    {
        if (Auth::guard('web')->check()) {
            return view('admin.adminera-table');
        }
        if (Auth::guard('era')->check()) {
            return view('maindealer.hondacare-table');
        }
        return abort(403, 'Unauthorized access');
    }
    
    public function geteradata(Request $request)
    {
        $userSurvey = Auth::guard('web')->user();
        $userEra = Auth::guard('era')->user();
        $data = FormEra::query()->orderBy('id_form', 'desc');
        if ($userSurvey instanceof User && $userSurvey->roles === 'admin'){
        }
        if ($userEra instanceof UserEra && $userEra->level === 'korlap') {
            $data->where('kode', $userEra->kode);
        }

        if ($request->has('search') && !empty($request->search['value'])) {
            $search = $request->search['value'];
            $data->where(function ($query) use ($search) {
                $query->where('id_form', 'like', '%' . $search . '%')
                    ->orWhere('tiketich', 'like', '%' . $search . '%')
                    ->orWhere('nama', 'like', '%' . $search . '%')
                    ->orWhere('no_telp', 'like', '%' . $search . '%')
                    ->orWhere('tipeservis', 'like', '%' . $search . '%')
                    ->orWhere('statuspenyelesaian', 'like', '%' . $search . '%')
                    ->orWhere('kode', 'like', '%' . $search . '%')
                    ->orWhere('no_telp', 'like', '%' . $search . '%');
            });
        }
        $result = DataTables()->of($data)
        ->addColumn('action', function ($row) use ($userSurvey, $userEra) {
            $buttons = '';
            if ($userSurvey instanceof User && $userSurvey->roles === 'admin') {
                $buttons .= '<a href="' . url('/era/detail/' . $row->id_form) . '" class="btn btn-sm btn-info"> <i class="fas fa-eye"></i> </a> ';
                $buttons .= '<a href="' . url('/era/update/' . $row->id_form) . '" class="btn btn-sm btn-warning"> <i class="fas fa-edit"></i> </a> ';
                $buttons .= '<form action="' . url('/era/delete/' . $row->id_form) . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Apakah Anda yakin ingin menghapus data ini?\');">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash-alt"></i> </button>
                            </form>';
            }
            if ($userEra instanceof UserEra && $userEra->level === 'korlap') {
                $buttons .= '<a href="' . url('/era/detail/' . $row->id_form) . '" class="btn btn-sm btn-info"> <i class="fas fa-eye"></i> </a> ';
                $buttons .= '<a href="' . url('/eramd/update/' . $row->id_form) . '" class="btn btn-sm btn-icon btn-warning"><i class="far fa-edit"></i></a>';
            }

            return $buttons;
        })
            ->rawColumns(['action'])
            ->toJson();
        return $result;
    }
    public function eraupdate($id_form)
    {
        $userSurvey = Auth::guard('web')->user();
        $userEra = Auth::guard('era')->user();
        $data = FormEra::where('id_form', $id_form)->firstOrFail();
        if ($userSurvey instanceof User && $userSurvey->roles === 'admin') {
            return view('admin.adminera-update', compact('data'));
        }
        if ($userEra instanceof UserEra && $userEra->level === 'korlap') {
            if ($data->kode !== $userEra->kode) {
                return redirect()->back();
            }    
            return view('maindealer.hondacare-update', compact('data'));
        }
    }
}
