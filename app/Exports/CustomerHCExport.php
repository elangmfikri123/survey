<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerHCExport implements FromCollection, WithHeadings
{
    protected $customerhc;

    public function __construct($customerhc)
    {
        $this->customerhc = $customerhc;
    }

    public function collection()
    {
        return $this->customerhc->map(function ($customerhc) {
            return [
                'Phone' => $customerhc->phone,
                'URL' => url('/fhc/' . $customerhc->uuid),
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
