<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Exports\CustomersExport;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class ExportController extends Controller
{
    public function export(Request $request)
    {
        return view('admin.awarenes-export');
    }
    public function exportcc(Request $request)
    {
        try {
            $startDate = Carbon::createFromFormat('Y-m-d', $request->input('start_date_result'))->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $request->input('end_date_result'))->endOfDay();

            $data = Customer::leftJoin('form', 'customers.id', '=', 'form.customer_id')
                ->select('customers.*', 'form.jawaban_1', 'form.jawaban_2', 'form.jawaban_3', 'form.jawaban_4', 'form.jawaban_5', 'form.created_at')
                ->whereBetween('customers.created_at', [$startDate, $endDate])
                ->get();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Header
            $sheet->setCellValue('A1', 'No');
            $sheet->setCellValue('B1', 'Customer ID (NIK)');
            $sheet->setCellValue('C1', 'Nama');
            $sheet->setCellValue('D1', 'No Handphone');
            $sheet->setCellValue('E1', 'Alamat');
            $sheet->setCellValue('F1', 'Kelurahan');
            $sheet->setCellValue('G1', 'Kecamatan');
            $sheet->setCellValue('H1', 'Kab/Kota');
            $sheet->setCellValue('I1', 'Provinsi');
            $sheet->setCellValue('J1', 'Motorcycle');
            $sheet->setCellValue('K1', 'Frame Number');
            $sheet->setCellValue('L1', 'Main Dealer');
            $sheet->setCellValue('M1', 'Dealer Code');
            $sheet->setCellValue('N1', 'Sales Date');
            $sheet->setCellValue('O1', 'Status');
            $sheet->setCellValue('P1', 'Jawaban1');
            $sheet->setCellValue('Q1', 'Jawaban2');
            $sheet->setCellValue('R1', 'Jawaban3');
            $sheet->setCellValue('S1', 'Jawaban4');
            $sheet->setCellValue('T1', 'Jawaban5');
            $sheet->setCellValue('U1', 'Waktu Submit');

            // Mengatur Format Header
            $headerStyle = [
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
            ];

            $sheet->getStyle('A1:U1')->applyFromArray($headerStyle);

            // Data
        $row = 2; // Mulai dari baris kedua setelah header
        $no = 1; // Inisialisasi nomor urutan
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValueExplicit('B' . $row, $item->nik, DataType::TYPE_STRING); // Atur format sel sebagai teks
            $sheet->setCellValue('C' . $row, $item->name);
            $sheet->setCellValueExplicit('D' . $row, $item->phone, DataType::TYPE_STRING);
            $sheet->setCellValue('E' . $row, $item->alamat);
            $sheet->setCellValue('F' . $row, $item->kelurahan);
            $sheet->setCellValue('G' . $row, $item->kecamatan);
            $sheet->setCellValue('H' . $row, $item->kota);
            $sheet->setCellValue('I' . $row, $item->provinsi);
            $sheet->setCellValue('J' . $row, $item->motor);
            $sheet->setCellValue('K' . $row, $item->frame_no);
            $sheet->setCellValue('L' . $row, $item->main_dealer);
            $sheet->setCellValueExplicit('M' . $row, $item->dealer_code, DataType::TYPE_STRING);
            $sheet->setCellValue('N' . $row, $item->sales_date);
            $sheet->setCellValue('O' . $row, $item->status);
            $sheet->setCellValue('P' . $row, $item->jawaban_1);
            $sheet->setCellValue('Q' . $row, $item->jawaban_2);
            $sheet->setCellValue('R' . $row, $item->jawaban_3);
            $sheet->setCellValue('S' . $row, $item->jawaban_4);
            $sheet->setCellValue('T' . $row, $item->jawaban_5);
            $sheet->setCellValue('U' . $row, $item->created_at);
            $row++;
            $no++;
        }

        // Menambahkan Border
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ];
        $sheet->getStyle('A1:U' . ($row - 1))->applyFromArray($styleArray);

            $filename = 'export_data.xlsx';
            $path = storage_path('app/' . $filename);

            $writer = new Xlsx($spreadsheet);
            $writer->save($path);

            return response()->download($path, $filename)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function exportExcel(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Ubah format tanggal dari dd/mm/yyyy ke yyyy-mm-dd
        $startDate = Carbon::createFromFormat('Y-m-d', $startDate)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d', $endDate)->endOfDay();

        $customers = Customer::whereBetween('created_at', [
            $startDate,
            $endDate,
        ])->get();

        $fileName = 'BroadcastAwarenessCC.xlsx';
        return Excel::download(new CustomersExport($customers), $fileName);
    }

}
