<?php

namespace App\Http\Controllers;

use App\Models\CustomercHc;
use Illuminate\Http\Request;

class SatisfactionHondaCareController extends Controller
{
    public function indexcsat()
    {
        return view('admin.csathc-table');
    }
    public function surveytablechc(Request $request)
    {
        $data = CustomercHc::query();
        // Filter berdasarkan pencarian
        if ($request->has('search') && !empty($request->search['value'])) {
            $search = $request->search['value'];
            $data->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('tiketicc', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('motor', 'like', '%' . $search . '%')
                    ->orWhere('main_dealer', 'like', '%' . $search . '%')
                    ->orWhere('waktu', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%');
            });
        }
        $result = DataTables()->of($data)
            ->addColumn('status', function ($row) {
                $badgeClass = $row->status == 'Belum Terisi' ? 'badge-warning' : 'badge-success';
                return '<span class="badge ' . $badgeClass . '">' . $row->status . '</span>';
            })
            ->addColumn('action', function ($row) {
                $action = '<a href="' . url('/survey-csathc/data/' . $row->id) . '" class="btn btn-sm btn-primary">Detail</a>';
                $edit = '<a href="' . url('/survey-csathc/data/' . $row->id) . '" class="btn btn-sm btn-warning">Edit</a>';
                // Tambahkan tombol aksi lainnya sesuai kebutuhan
                return $action.'  '.$edit;
            })
            ->rawColumns(['status','action'])
            ->toJson();
        return $result;
    }
    public function detaildatachc($id)
    {
        $item = CustomercHc::findOrFail($id);
        // Menggunakan optional untuk mengatasi jika form null
        $form = optional($item->formchc);
        return view('admin.detailcsathc', compact('item', 'form'));
    }
}
