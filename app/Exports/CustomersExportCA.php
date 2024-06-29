<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomersExportCA implements FromCollection, WithHeadings
{
    protected $customers;

    public function __construct($customers)
    {
        $this->customers = $customers;
    }

    public function collection()
    {
        return $this->customers->map(function ($customer) {
            return [
                'Nama' => $customer->name,
                'Phone' => $customer->phone,
                'URL' => url('/fca/' . $customer->uuid),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Phone',
            'URL',
        ];
    }
}
