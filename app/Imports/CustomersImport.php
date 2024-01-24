<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Customer([
            'uuid' => $this->generateUuid(), // Anda mungkin perlu membuat fungsi generate_uuid
            'nik' => $row['nik'],
            'name' => $row['name'],
            'alamat' => $row['alamat'],
            'kelurahan' => $row['kelurahan'],
            'kecamatan' => $row['kecamatan'],
            'kota' => $row['kota'],
            'provinsi' => $row['provinsi'],
            'phone' => $row['phone'],
            'motor' => $row['motor'],
            'frame_no' => $row['frame_no'],
            'main_dealer' => $row['main_dealer'],
            'dealer_code' => $row['dealer_code'],
            'sales_date' => $row['sales_date'],
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