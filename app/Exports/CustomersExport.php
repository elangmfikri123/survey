<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomersExport implements FromCollection, WithHeadings
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
                'Phone' => $customer->phone,
                'URL' => url('/form/' . $customer->uuid),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Phone',
            'URL',
        ];
    }
}
