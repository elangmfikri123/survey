<?php

namespace App\Imports;

use App\Models\CustomerCA;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImportCA implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new CustomerCA([
            'uuid' => $this->generateUuid(), // Anda mungkin perlu membuat fungsi generate_uuid
            'tiketicc' => $row['tiketicc'],
            'name' => $row['name'],
            'phone' => $row['phone'],
            'alamat' => $row['alamat'],
            'kota' => $row['kota'],
            'area' => $row['area'],           
            'motor' => $row['motor'],
            'main_dealer' => $row['main_dealer'],
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
