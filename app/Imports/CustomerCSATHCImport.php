<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\CustomercHc;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerCSATHCImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {           
        return new CustomercHc([
            'uuid' => $this->generateUuid(), // Anda mungkin perlu membuat fungsi generate_uuid
            'tiketicc' => $row['tiketicc'],
            'name' => $row['name'],
            'phone' => $row['phone'],
            'alamat' => $row['alamat'],
            'kota' => $row['kota'],
            'provinsi' => $row['provinsi'],           
            'motor' => $row['motor'],
            'frame_no' => $row['frame_no'],
            'tahun_motor' => $row['tahun_motor'],
            'masalah' => $row['masalah'],
            'tipeservis' => $row['tipeservis'],
            'status_penyelesaian' => $row['status_penyelesaian'],
            'main_dealer' => $row['main_dealer'],
            'nama_ahass' => $row['nama_ahass'],
            'waktu' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['waktu']),
            'status' => 'Belum Terisi', // Status default 'Belum Terisi'
        ]);
    }

    private function generateUuid()
    {
        // Menggunakan uniqid() untuk mendapatkan timestamp dengan presisi mikrodetik
        $timestamp = random_bytes(10);

        // Menggunakan md5() untuk menghasilkan hash dari timestamp
        $hash = bin2hex($timestamp);

        // Hapus karakter khusus dan batasan panjang menjadi 10 karakter
        $uuid = substr($hash, 0, 10);

        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $uuid = '';
    
        for ($i = 0; $i < 10; $i++) {
            $uuid .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $uuid;
    }
}
