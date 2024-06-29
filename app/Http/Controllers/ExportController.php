<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use App\Models\CustomerCA;
use App\Models\CustomerHc;
use App\Models\CustomercHc;
use Illuminate\Http\Request;
use App\Exports\CustomersExport;
use App\Exports\CustomerHCExport;
use App\Exports\CustomersExportCA;
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

            $data = CustomerHc::leftJoin('formhc', 'customerhc.id', '=', 'formhc.customer_hc_id')
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

            $data = CustomercHc::leftJoin('formchc', 'customerchc.id', '=', 'formchc.customerc_hc_id')
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
            $sheet->setCellValue('B1', 'Tiket ICC');
            $sheet->setCellValue('C1', 'Nama');
            $sheet->setCellValue('D1', 'No Handphone');
            $sheet->setCellValue('E1', 'Alamat');
            $sheet->setCellValue('F1', 'Kab/Kota');
            $sheet->setCellValue('G1', 'Provinsi');
            $sheet->setCellValue('H1', 'Motorcycle');
            $sheet->setCellValue('I1', 'Frame Number');
            $sheet->setCellValue('J1', 'Tahun Motor');
            $sheet->setCellValue('K1', 'Masalah');
            $sheet->setCellValue('L1', 'Tipe Servis');
            $sheet->setCellValue('M1', 'Status Penyelesaian');
            $sheet->setCellValue('N1', 'Main Dealer');
            $sheet->setCellValue('O1', 'Nama Ahass');
            $sheet->setCellValue('P1', 'Waktu');
            $sheet->setCellValue('Q1', 'Status');
            $sheet->setCellValue('R1', '1. Apakah sudah pernah menggunakan fasilitas Honda CARE atau pertolongan darurat di jalan ?');
            $sheet->setCellValue('S1', '2. Darimana Bapak/Ibu mengetahui adanya fasilitas Honda CARE atau pertolongan motor di jalan ?');
            $sheet->setCellValue('T1', '3. Berapa kali Anda harus menghubungi nomer telp.layanan Honda CARE untuk mendapatkan respon ?');
            $sheet->setCellValue('U1', '4. Berapa lama armada/mekanik Honda CARE tiba di lokasi Bapak/Ibu ?');
            $sheet->setCellValue('V1', '5. Sudah puaskah dg waktu tunggu mekanik sampai di lokasi Bapak/Ibu ?');
            $sheet->setCellValue('W1', 'Jika dirasa TIDAK PUAS, idealnya berapa lama waktu tunggu bagi Bapak/Ibu ?');
            $sheet->setCellValue('X1', '6. Apakah tindakan sementara dari mekanik Honda CARE sudah membantu Bapak/Ibu saat membutuhkan pertolongan darurat di jalan ?');
            $sheet->setCellValue('Y1', '7. Apakah mekanik Honda CARE menawarkan pembelian suku cadang lain ?');
            $sheet->setCellValue('Z1', '8. Apakah mekanik Honda CARE menawarkan/menginfokan/promosi produk Honda ?');
            $sheet->setCellValue('AA1', '9. Secara keseluruhan sudah puaskah dengan pelayanan dari Honda CARE ?');
            $sheet->setCellValue('AB1', 'Jika dirasa TIDAK PUAS, mengapa dan alasannya ?');
            $sheet->setCellValue('AC1', 'Lainnya, sebutkan...');
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
            $sheet->setCellValue('B' . $row, $item->tiketicc); // Atur format sel sebagai teks
            $sheet->setCellValue('C' . $row, $item->name);
            $sheet->setCellValue('D' . $row, $item->phone);
            $sheet->setCellValue('E' . $row, $item->alamat);
            $sheet->setCellValue('F' . $row, $item->kota);
            $sheet->setCellValue('G' . $row, $item->provinsi);
            $sheet->setCellValue('H' . $row, $item->motor);
            $sheet->setCellValue('I' . $row, $item->frame_no);
            $sheet->setCellValue('J' . $row, $item->tahun_motor);
            $sheet->setCellValue('K' . $row, $item->masalah);
            $sheet->setCellValue('L' . $row, $item->tipeservis);
            $sheet->setCellValue('M' . $row, $item->status_penyelesaian);
            $sheet->setCellValue('N' . $row, $item->main_dealer);
            $sheet->setCellValue('O' . $row, $item->nama_ahass);
            $sheet->setCellValue('P' . $row, $item->waktu);
            $sheet->setCellValue('Q' . $row, $item->status);
            $sheet->setCellValue('R' . $row, $item->jawaban_1);
            $sheet->setCellValue('S' . $row, $item->jawaban_2);
            $sheet->setCellValue('T' . $row, $item->jawaban_3);
            $sheet->setCellValue('U' . $row, $item->jawaban_4);
            $sheet->setCellValue('V' . $row, $item->jawaban_5);
            $sheet->setCellValue('W' . $row, $item->jawaban_5a);
            $sheet->setCellValue('X' . $row, $item->jawaban_6);
            $sheet->setCellValue('Y' . $row, $item->jawaban_7);
            $sheet->setCellValue('Z' . $row, $item->jawaban_8);
            $sheet->setCellValue('AA' . $row, $item->jawaban_9);
            $sheet->setCellValue('AB' . $row, $item->jawaban_10);
            $sheet->setCellValue('AC' . $row, $item->jawaban_11);
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

            $filename = 'Report-Hasil CSAT.xlsx';
            $path = storage_path('app/' . $filename);

            $writer = new Xlsx($spreadsheet);
            $writer->save($path);

            return response()->download($path, $filename)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

        //EXPORT CONTROLLER CSAT CUSTOMER ASSISTANCE
        public function exportca(Request $request)
        {
            return view('admin.csat-exportca');
        }

        public function exportExcelca(Request $request)
        {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
    
            // Ubah format tanggal dari dd/mm/yyyy ke yyyy-mm-dd
            $startDate = Carbon::createFromFormat('Y-m-d', $startDate)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $endDate)->endOfDay();
    
            $customerca = CustomerCA::whereBetween('created_at', [
                $startDate,
                $endDate,
            ])->get();
    
            $fileName = 'CSAT-CA-BroadcastTemplate.xlsx';
            return Excel::download(new CustomersExportCA($customerca), $fileName);
        }

        public function exporthasilca(Request $request)
        {
            try {
                $startDate = Carbon::createFromFormat('Y-m-d', $request->input('start_date_result'))->startOfDay();
                $endDate = Carbon::createFromFormat('Y-m-d', $request->input('end_date_result'))->endOfDay();
    
                $data = CustomerCA::leftJoin('formca', 'customerca.id', '=', 'formca.customer_c_a_id')
                    ->select('customerca.*',
                    'formca.jawaban_1',
                    'formca.jawaban_1a',
                    'formca.jawaban_2',
                    'formca.jawaban_3',
                    'formca.jawaban_3a',
                    'formca.jawaban_4',
                    'formca.jawaban_4a',
                    'formca.jawaban_5',
                    'formca.jawaban_5a',
                    'formca.jawaban_6',
                    'formca.jawaban_6a',
                    'formca.jawaban_7',
                    'formca.jawaban_7a',
                    'formca.jawaban_8',
                    'formca.jawaban_8a',
                    'formca.jawaban_9',
                    'formca.jawaban_10',
                    'formca.jawaban_10a',
                    'formca.jawaban_11',
                    'formca.setuju',
                    'formca.created_at')
                    ->whereBetween('customerca.created_at', [$startDate, $endDate])
                    ->get();
    
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
    
                // Header
                $sheet->setCellValue('A1', 'No');
                $sheet->setCellValue('B1', 'Tiket ICC');
                $sheet->setCellValue('C1', 'Nama');
                $sheet->setCellValue('D1', 'No Handphone');
                $sheet->setCellValue('E1', 'Alamat');
                $sheet->setCellValue('F1', 'Kab/Kota');
                $sheet->setCellValue('G1', 'Area');
                $sheet->setCellValue('H1', 'Motorcycle');
                $sheet->setCellValue('I1', 'Main Dealer');
                $sheet->setCellValue('J1', 'Waktu');
                $sheet->setCellValue('K1', 'Status');
                $sheet->setCellValue('L1', '1. Bagaimana Bapak/Ibu menilai kemudahan menyampaikan keluhan?');
                $sheet->setCellValue('M1', 'Jelaskan alasannya');
                $sheet->setCellValue('N1', '2. Berapa lama Bapak/Ibu dihubungi oleh pihak kami (Dealer/AHASS) setelah menyampaikan keluhan?');
                $sheet->setCellValue('O1', '3. Seberapa puas Bapak/Ibu dengan respon pertama dari pihak Dealer/AHASS?');
                $sheet->setCellValue('P1', 'Mohon jelaskan kepada kami, apa alasan Bapak/Ibu menjawab cukup puas/kurang puas/tidak puas sama sekali dengan respon pertama dari pihak Dealer/AHASS?');
                $sheet->setCellValue('Q1', '4. Bagaimana Bapak menilai keramahan staf yang menangani keluhan Bapak/Ibu?');
                $sheet->setCellValue('R1', 'Jelaskan alasannya');
                $sheet->setCellValue('S1', '5. Seberapa jelas informasi yang diberikan tentang proses penanganan keluhan Bapak/Ibu?');
                $sheet->setCellValue('T1', 'Jelaskan alasannya');
                $sheet->setCellValue('U1', '6. Seberapa efektif solusi yang diberikan dalam menyelesaikan keluhan Bapak/Ibu?');
                $sheet->setCellValue('V1', 'Jelaskan alasannya');
                $sheet->setCellValue('W1', '7. Apakah keluhan Bapak/Ibu ditangani dalam waktu yang wajar?');
                $sheet->setCellValue('X1', 'Berapa lama waktu yang Bapak/Ibu inginkan (angka dalam hari)?');
                $sheet->setCellValue('Y1', '8. Seberapa puas Bapak/Ibu dengan solusi yang diberikan maupun proses penyelesaian keluhan dari pihak Dealer/AHASS?');
                $sheet->setCellValue('Z1', 'Mohon jelaskan kepada kami, apa alasan Bapak/Ibu menjawab cukup puas/kurang puas/tidak puas sama sekali dengan solusi yang diberikan maupun proses penyelesaian dari pihak Dealer/AHASS?');
                $sheet->setCellValue('AA1', '9. Apakah Bapak/Ibu akan merekomendasikan Sepeda Motor Honda kepada orang lain? <br>1 Sangat tidak merekomendasikan - 10 Sangat merekomendasikan');
                $sheet->setCellValue('AB1', '10. Apakah Bapak/Ibu berencana membeli Sepeda Motor Honda lagi?');
                $sheet->setCellValue('AC1', 'Jika ya, maka dalam jangka waktu berapa lama?');
                $sheet->setCellValue('AD1', '11. Tipe Motor apa yang Bapak/Ibu rencanakan untuk dibeli kembali?');
                $sheet->setCellValue('AE1', 'Setuju');
                $sheet->setCellValue('AF1', 'Waktu Submit');
    
                // Mengatur Format Header
                $headerStyle = [
                    'font' => ['bold' => true],
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                ];
    
                $sheet->getStyle('A1:AF1')->applyFromArray($headerStyle);
    
                // Data
            $row = 2; // Mulai dari baris kedua setelah header
            $no = 1; // Inisialisasi nomor urutan
            foreach ($data as $item) {
                $sheet->setCellValue('A' . $row, $no);
                $sheet->setCellValue('B' . $row, $item->tiketicc); // Atur format sel sebagai teks
                $sheet->setCellValue('C' . $row, $item->name);
                $sheet->setCellValue('D' . $row, $item->phone);
                $sheet->setCellValue('E' . $row, $item->alamat);
                $sheet->setCellValue('F' . $row, $item->kota);
                $sheet->setCellValue('G' . $row, $item->area);
                $sheet->setCellValue('H' . $row, $item->motor);
                $sheet->setCellValue('I' . $row, $item->main_dealer);
                $sheet->setCellValue('J' . $row, $item->waktu);
                $sheet->setCellValue('K' . $row, $item->status);
                $sheet->setCellValue('L' . $row, $item->jawaban_1);
                $sheet->setCellValue('M' . $row, $item->jawaban_1a);
                $sheet->setCellValue('N' . $row, $item->jawaban_2);
                $sheet->setCellValue('O' . $row, $item->jawaban_3);
                $sheet->setCellValue('P' . $row, $item->jawaban_3a);
                $sheet->setCellValue('Q' . $row, $item->jawaban_4);
                $sheet->setCellValue('R' . $row, $item->jawaban_4a);
                $sheet->setCellValue('S' . $row, $item->jawaban_5);
                $sheet->setCellValue('T' . $row, $item->jawaban_5a);
                $sheet->setCellValue('U' . $row, $item->jawaban_6);
                $sheet->setCellValue('V' . $row, $item->jawaban_6a);
                $sheet->setCellValue('W' . $row, $item->jawaban_7);
                $sheet->setCellValue('X' . $row, $item->jawaban_7a);
                $sheet->setCellValue('Y' . $row, $item->jawaban_8);
                $sheet->setCellValue('Z' . $row, $item->jawaban_8a);
                $sheet->setCellValue('AA' . $row, $item->jawaban_9);
                $sheet->setCellValue('AB' . $row, $item->jawaban_10);
                $sheet->setCellValue('AC' . $row, $item->jawaban_10a);
                $sheet->setCellValue('AD' . $row, $item->jawaban_11);
                $sheet->setCellValue('AE' . $row, $item->setuju);
                $sheet->setCellValue('AF' . $row, $item->created_at);
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
            $sheet->getStyle('A1:AF' . ($row - 1))->applyFromArray($styleArray);
    
                $filename = 'Report-Hasil CSAT CA.xlsx';
                $path = storage_path('app/' . $filename);
    
                $writer = new Xlsx($spreadsheet);
                $writer->save($path);
    
                return response()->download($path, $filename)->deleteFileAfterSend(true);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
}
