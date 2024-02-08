<?php

namespace App\Http\Controllers;

use League\Csv\Reader;
use Illuminate\Http\Request;
use App\Imports\CustomersImport;
use App\Imports\CustomerHCImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);
        Excel::import(new CustomersImport, $request->file('file'));
        return redirect()->back()->with('success', 'Formulir berhasil disubmit.');
    }
    public function importhc(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);
        Excel::import(new CustomerHCImport, $request->file('file'));
        return redirect()->back()->with('success', 'Formulir berhasil disubmit.');
    }
}

