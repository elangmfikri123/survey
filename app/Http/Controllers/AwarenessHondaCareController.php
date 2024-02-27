<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use App\Models\CustomerHc;
use Illuminate\Http\Request;

class AwarenessHondaCareController extends Controller
{
    public function indexhc()
    {
        return view('admin.awareneshc-table');
    }
    public function surveytableHc(Request $request)
    {
        $data = CustomerHc::query();
        // Filter berdasarkan pencarian
        if ($request->has('search') && !empty($request->search['value'])) {
            $search = $request->search['value'];
            $data->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                    ->orWhere('uuid', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%')
                    ->orWhere('motor', 'like', '%' . $search . '%')
                    ->orWhere('main_dealer', 'like', '%' . $search . '%')
                    ->orWhere('sales_date', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%');
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
    public function detaildatahc($id)
    {
        $item = CustomerHc::findOrFail($id);
        // Menggunakan optional untuk mengatasi jika form null
        $form = optional($item->form);
        return view('admin.detailawareneshc', compact('item', 'form'));
    }
}
