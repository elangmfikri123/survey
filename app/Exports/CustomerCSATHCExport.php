<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerCSATHCExport implements FromCollection, WithHeadings
{
    protected $customerchc;

    public function __construct($customerhc)
    {
        $this->customerchc = $customerhc;
    }

    public function collection()
    {
        return $this->customerchc->map(function ($customerchc) {
            return [
                'Phone' => $customerchc->phone,
                'URL' => url('/fchc/' . $customerchc->uuid),
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
