<?php

namespace App\Http\Controllers;

use App\Models\CustomerCA;
use Illuminate\Http\Request;

class SatisfactionCAController extends Controller
{
    public function indexcsatca()
    {
        return view('admin.csatca-table');
    }
    public function surveytableca(Request $request)
    {
        $data = CustomerCA::query();
        // Filter berdasarkan pencarian
        if ($request->has('search') && !empty($request->search['value'])) {
            $search = $request->search['value'];
            $data->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('uuid', 'like', '%' . $search . '%')
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
                $action = '<a href="' . url('/survey-csatca/data/' . $row->id) . '" class="btn btn-sm btn-primary">Detail</a>';
                $edit = '<a href="' . url('/survey-csatca/data/' . $row->id) . '" class="btn btn-sm btn-warning">Edit</a>';
                // Tambahkan tombol aksi lainnya sesuai kebutuhan
                return $action.'  '.$edit;
            })
            ->rawColumns(['status','action'])
            ->toJson();
        return $result;
    }

    public function detaildataca($id)
    {
        $item = CustomerCA::findOrFail($id);
        // Menggunakan optional untuk mengatasi jika form null
        $form = optional($item->form);
        return view('admin.detailcsatca', compact('item', 'form'));
    }
}
