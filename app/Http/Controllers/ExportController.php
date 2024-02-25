<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use App\Models\CustomerHc;
use App\Models\CustomercHc;
use Illuminate\Http\Request;
use App\Exports\CustomersExport;
use App\Exports\CustomerHCExport;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerCSATHCExport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class ExportController extends Controller
{
    //EXPORT CONTROLLER AWARENESS CONTACT CENTER
    public function export(Request $request)
    {
        return view('admin.awarenes-export');
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
    public function exportcc(Request $request)
    {
        try {
            $startDate = Carbon::createFromFormat('Y-m-d', $request->input('start_date_result'))->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $request->input('end_date_result'))->endOfDay();

            $data = Customer::leftJoin('form', 'customers.id', '=', 'form.customer_id')
                ->select('customers.*',
                'form.jawaban_1',
                'form.jawaban_1a',
                'form.jawaban_2',
                'form.jawaban_3',
                'form.jawaban_4',
                'form.jawaban_5',
                'form.jawaban_6',
                'form.jawaban_7',
                'form.created_at')
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
            $sheet->setCellValue('P1', '1. Jika ada keluhan mengenai produk/layanan motor honda, kemana dan bagaimana Anda menyampaikan keluhan tersebut ?');
            $sheet->setCellValue('Q1', 'Jawaban Lainnya');
            $sheet->setCellValue('R1', '2. Bapak/ibu jika ada keluhan mengenai motor honda ada gak keinginan menyampaikan ke AHM sebagai produsen ?');
            $sheet->setCellValue('S1', '3. Bapak/ibu apa mengetahui Astra Honda Motor memiliki layanan contact center untuk keluhan konsumen ?');
            $sheet->setCellValue('T1', '4. Layanan Contact Center Astra Honda Motor yang Anda ketahui ? (Bisa pilih lebih dari 1)');
            $sheet->setCellValue('U1', '5. Dari mana anda mengetahui layanan contact center ?');
            $sheet->setCellValue('V1', 'Jawaban Lainnya');
            $sheet->setCellValue('W1', '7. Jika ada keluhan mengenai produk/layanan motor honda apakah berkenan menghubungi contact center ?');
            $sheet->setCellValue('X1', 'Waktu Submit');

            // Mengatur Format Header
            $headerStyle = [
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
            ];

            $sheet->getStyle('A1:X1')->applyFromArray($headerStyle);

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
            $sheet->setCellValue('Q' . $row, $item->jawaban_1a);
            $sheet->setCellValue('R' . $row, $item->jawaban_2);
            $sheet->setCellValue('S' . $row, $item->jawaban_3);
            $sheet->setCellValue('T' . $row, $item->jawaban_4);
            $sheet->setCellValue('U' . $row, $item->jawaban_5);
            $sheet->setCellValue('V' . $row, $item->jawaban_6);
            $sheet->setCellValue('W' . $row, $item->jawaban_7);
            $sheet->setCellValue('X' . $row, $item->created_at);
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
        $sheet->getStyle('A1:X' . ($row - 1))->applyFromArray($styleArray);

            $filename = 'Report-AwarenesCC.xlsx';
            $path = storage_path('app/' . $filename);

            $writer = new Xlsx($spreadsheet);
            $writer->save($path);

            return response()->download($path, $filename)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    //EXPORT CONTROLLER AWARENESS HONDA CARE
    public function exporthc(Request $request)
    {
        return view('admin.awarenes-exporthc');
    }
    public function exportExcelhc(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Ubah format tanggal dari dd/mm/yyyy ke yyyy-mm-dd
        $startDate = Carbon::createFromFormat('Y-m-d', $startDate)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d', $endDate)->endOfDay();

        $customerhc = CustomerHc::whereBetween('created_at', [
            $startDate,
            $endDate,
        ])->get();

        $fileName = 'HC-BroadcastTemplate.xlsx';
        return Excel::download(new CustomerHCExport($customerhc), $fileName);
    }
    public function exporthasilhc(Request $request)
    {
        try {
            $startDate = Carbon::createFromFormat('Y-m-d', $request->input('start_date_result'))->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $request->input('end_date_result'))->endOfDay();

            $data = CustomerHc::leftJoin('formhc', 'customerhc.id', '=', 'formhc.customer_id')
                ->select('customerhc.*',
                'formhc.jawaban_1',
                'formhc.jawaban_1a',
                'formhc.jawaban_2',
                'formhc.jawaban_3',
                'formhc.jawaban_4',
                'formhc.jawaban_5',
                'formhc.jawaban_5a',
                'formhc.jawaban_6',
                'formhc.jawaban_7',
                'formhc.jawaban_8',
                'formhc.jawaban_9',
                'formhc.jawaban_10',
                'formhc.jawaban_11',
                'formhc.jawaban_12',
                'formhc.created_at')
                ->whereBetween('customerhc.created_at', [$startDate, $endDate])
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
            $sheet->setCellValue('P1', '1. Jika ada keluhan mengenai produk/layanan motor honda, kemana dan bagaimana Anda menyampaikan keluhan tersebut ?');
            $sheet->setCellValue('Q1', 'Jawaban Lainnya');
            $sheet->setCellValue('R1', '2. Bapak/ibu jika ada keluhan mengenai motor honda ada gak keinginan menyampaikan ke AHM sebagai produsen ?');
            $sheet->setCellValue('S1', '3. Bapak/ibu apa mengetahui Astra Honda Motor memiliki layanan contact center untuk keluhan konsumen ?');
            $sheet->setCellValue('T1', '4. Layanan Contact Center Astra Honda Motor yang Anda ketahui ? (Bisa pilih lebih dari 1)');
            $sheet->setCellValue('U1', '5. Dari mana anda mengetahui layanan contact center ?');
            $sheet->setCellValue('V1', 'Jawaban Lainnya');
            $sheet->setCellValue('W1', '6. Apakah anda mengetahui/pernah mendengar Honda memiliki layanan pertolongan darurat di jalan?');
            $sheet->setCellValue('X1', '7. Apakah anda mengetahui/pernar mendengan layanan Honda Care ?');
            $sheet->setCellValue('Y1', '8. Anda mengetahui layanan honda care/pertolongan darurat dijalan dari mana ?');
            $sheet->setCellValue('Z1', '9. Jika anda memerlukan bantuan darurat dijalan mengenai motor honda, apakah tau harus menghubungi kemana ?');
            $sheet->setCellValue('AA1', '10. Apakah tau cara menghubungi layanan honda care ?');
            $sheet->setCellValue('AB1', '11. Jika ada keluhan mengenai produk/layanan motor honda apakah berkenan menghubungi contact center ?');
            $sheet->setCellValue('AC1', '12. Jika suatu saat anda membutuhkan layanan darurat dijalan apakah mau menggunkan layana Honda Care ?');
            $sheet->setCellValue('AD1', 'Waktu Submit');

            // Mengatur Format Header
            $headerStyle = [
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
            ];

            $sheet->getStyle('A1:AD1')->applyFromArray($headerStyle);

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
            $sheet->setCellValue('Q' . $row, $item->jawaban_1a);
            $sheet->setCellValue('R' . $row, $item->jawaban_2);
            $sheet->setCellValue('S' . $row, $item->jawaban_3);
            $sheet->setCellValue('T' . $row, $item->jawaban_4);
            $sheet->setCellValue('U' . $row, $item->jawaban_5);
            $sheet->setCellValue('V' . $row, $item->jawaban_5a);
            $sheet->setCellValue('W' . $row, $item->jawaban_6);
            $sheet->setCellValue('X' . $row, $item->jawaban_7);
            $sheet->setCellValue('Y' . $row, $item->jawaban_8);
            $sheet->setCellValue('Z' . $row, $item->jawaban_9);
            $sheet->setCellValue('AA' . $row, $item->jawaban_10);
            $sheet->setCellValue('AB' . $row, $item->jawaban_11);
            $sheet->setCellValue('AC' . $row, $item->jawaban_12);
            $sheet->setCellValue('AD' . $row, $item->created_at);
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
        $sheet->getStyle('A1:AD' . ($row - 1))->applyFromArray($styleArray);

            $filename = 'Report-AwarenesHC.xlsx';
            $path = storage_path('app/' . $filename);

            $writer = new Xlsx($spreadsheet);
            $writer->save($path);

            return response()->download($path, $filename)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    //EXPORT CONTROLLER CSAT HONDA CARE
    public function exportcsathc(Request $request)
    {
        return view('admin.csat-exporthc');
    }
    public function exportExcelchc(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Ubah format tanggal dari dd/mm/yyyy ke yyyy-mm-dd
        $startDate = Carbon::createFromFormat('Y-m-d', $startDate)->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d', $endDate)->endOfDay();

        $customerchc = CustomercHc::whereBetween('created_at', [
            $startDate,
            $endDate,
        ])->get();

        $fileName = 'CSAT-HC-BroadcastTemplate.xlsx';
        return Excel::download(new CustomerCSATHCExport($customerchc), $fileName);
    }
    public function exporthasilchc(Request $request)
    {
        try {
            $startDate = Carbon::createFromFormat('Y-m-d', $request->input('start_date_result'))->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $request->input('end_date_result'))->endOfDay();

            $data = CustomercHc::leftJoin('formchc', 'customerchc.id', '=', 'formchc.customer_id')
                ->select('customerchc.*',
                'formchc.jawaban_1',
                'formchc.jawaban_2',
                'formchc.jawaban_3',
                'formchc.jawaban_4',
                'formchc.jawaban_5',
                'formchc.jawaban_5a',
                'formchc.jawaban_6',
                'formchc.jawaban_7',
                'formchc.jawaban_8',
                'formchc.jawaban_9',
                'formchc.jawaban_10',
                'formchc.jawaban_11',
                'formchc.jawaban_12',
                'formchc.created_at')
                ->whereBetween('customerchc.created_at', [$startDate, $endDate])
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
            $sheet->setCellValue('P1', '1. Jika ada keluhan mengenai produk/layanan motor honda, kemana dan bagaimana Anda menyampaikan keluhan tersebut ?');
            $sheet->setCellValue('Q1', 'Jawaban Lainnya');
            $sheet->setCellValue('R1', '2. Bapak/ibu jika ada keluhan mengenai motor honda ada gak keinginan menyampaikan ke AHM sebagai produsen ?');
            $sheet->setCellValue('S1', '3. Bapak/ibu apa mengetahui Astra Honda Motor memiliki layanan contact center untuk keluhan konsumen ?');
            $sheet->setCellValue('T1', '4. Layanan Contact Center Astra Honda Motor yang Anda ketahui ? (Bisa pilih lebih dari 1)');
            $sheet->setCellValue('U1', '5. Dari mana anda mengetahui layanan contact center ?');
            $sheet->setCellValue('V1', 'Jawaban Lainnya');
            $sheet->setCellValue('W1', '7. Jika ada keluhan mengenai produk/layanan motor honda apakah berkenan menghubungi contact center ?');
            $sheet->setCellValue('X1', 'Waktu Submit');

            // Mengatur Format Header
            $headerStyle = [
                'font' => ['bold' => true],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
            ];

            $sheet->getStyle('A1:X1')->applyFromArray($headerStyle);

            // Data
        $row = 2; // Mulai dari baris kedua setelah header
        $no = 1; // Inisialisasi nomor urutan
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValue('B' . $row, $item->nik); // Atur format sel sebagai teks
            $sheet->setCellValue('C' . $row, $item->name);
            $sheet->setCellValue('D' . $row, $item->phone);
            $sheet->setCellValue('E' . $row, $item->alamat);
            $sheet->setCellValue('F' . $row, $item->kelurahan);
            $sheet->setCellValue('G' . $row, $item->kecamatan);
            $sheet->setCellValue('H' . $row, $item->kota);
            $sheet->setCellValue('I' . $row, $item->provinsi);
            $sheet->setCellValue('J' . $row, $item->motor);
            $sheet->setCellValue('K' . $row, $item->frame_no);
            $sheet->setCellValue('L' . $row, $item->main_dealer);
            $sheet->setCellValue('M' . $row, $item->dealer_code);
            $sheet->setCellValue('N' . $row, $item->sales_date);
            $sheet->setCellValue('O' . $row, $item->status);
            $sheet->setCellValue('P' . $row, $item->jawaban_1);
            $sheet->setCellValue('Q' . $row, $item->jawaban_1a);
            $sheet->setCellValue('R' . $row, $item->jawaban_2);
            $sheet->setCellValue('S' . $row, $item->jawaban_3);
            $sheet->setCellValue('T' . $row, $item->jawaban_4);
            $sheet->setCellValue('U' . $row, $item->jawaban_5);
            $sheet->setCellValue('V' . $row, $item->jawaban_6);
            $sheet->setCellValue('W' . $row, $item->jawaban_7);
            $sheet->setCellValue('X' . $row, $item->created_at);
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
        $sheet->getStyle('A1:X' . ($row - 1))->applyFromArray($styleArray);

            $filename = 'Report-Hasil CSAT.xlsx';
            $path = storage_path('app/' . $filename);

            $writer = new Xlsx($spreadsheet);
            $writer->save($path);

            return response()->download($path, $filename)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
