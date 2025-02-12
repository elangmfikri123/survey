<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FormEra;
use App\Models\UserEra;
use Illuminate\Http\Request;

class HondaCareController extends Controller
{
    // public function getera()
    // {
    //     return view('admin.adminera-table');
    // }
    public function getera()
{
    $user = auth()->user();

    if ($user instanceof User) {
        return view('admin.adminera-table');
    } elseif ($user instanceof UserEra) {
        return view('maindealer.hondacare-table');
    } else {
        return abort(403, 'Unauthorized access');
    }
}
    public function geteradata(Request $request)
    {
        $data = FormEra::query()->orderBy('id_form', 'desc');
        // Filter berdasarkan pencarian
        if ($request->has('search') && !empty($request->search['value'])) {
            $search = $request->search['value'];
            $data->where(function ($query) use ($search) {
                $query->where('id_form', 'like', '%' . $search . '%')
                    ->orWhere('tiketich', 'like', '%' . $search . '%')
                    ->orWhere('nama', 'like', '%' . $search . '%')
                    ->orWhere('no_telp', 'like', '%' . $search . '%')
                    ->orWhere('smh', 'like', '%' . $search . '%')
                    ->orWhere('tipeservis', 'like', '%' . $search . '%')
                    ->orWhere('statuspenyelesaian', 'like', '%' . $search . '%')
                    ->orWhere('kode', 'like', '%' . $search . '%')
                    ->orWhere('no_telp', 'like', '%' . $search . '%');
            });
        }
        $result = DataTables()->of($data)
            ->addColumn('action', function ($row) {
                $action = '<a href="' . url('/era/update/' . $row->id_form) . '" class="btn btn-sm btn-icon btn-primary"><i class="far fa-edit"></i></a>';
                $edit = '<a href="' . url('/survey-awarenesshc/data/' . $row->id) . '" class="btn btn-sm btn-warning">Edit</a>';
                // Tambahkan tombol aksi lainnya sesuai kebutuhan
                return $action . '  ' . $edit;
            })
            ->rawColumns(['action'])
            ->toJson();
        return $result;
    }
    public function eraupdate($id_form)
    {
        $data = FormEra::where('id_form', $id_form)->firstOrFail();
        return view('admin.adminera-update', compact('data'));
    }
    // public function getera_update($id_form)
    // {
    //     $data = FormEra::where('id_form', $id_form)->firstOrFail();
    //     return response()->json($data);
    // }
}
