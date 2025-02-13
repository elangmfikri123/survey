<?php

namespace App\Http\Controllers;
use DataTables;
use App\Models\Form;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $status1 = Customer::where('status', 'Terisi')->count();
        $status2 = Customer::where('status', 'Belum Terisi')->count();
        return view('admin.dashboard', compact('status1', 'status2'));
    }
    public function index()
    {
        return view('admin.awarenes-table');
    }
    public function surveytable(Request $request)
    {
        $data = Customer::query();
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
                $action = '<a href="' . url('/survey-awareness/data/' . $row->id) . '" class="btn btn-sm btn-primary">Detail</a>';
                $edit = '<a href="' . url('/survey-awareness/data/' . $row->id) . '" class="btn btn-sm btn-warning">Edit</a>';
                return $action.'  '.$edit;
            })
            ->rawColumns(['status','action'])
            ->toJson();
        return $result;
    }

    public function detaildata($id)
    {
        $item = Customer::findOrFail($id);
        $form = optional($item->form);
        return view('admin.detailawarenes', compact('item', 'form'));
    }
}
