<?php

namespace App\Excel;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CofData implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        // Ambil semua data dari tabel services
        return Service::select(
            'id',
            'brand',
            'serial_number',
            'product_number',
            'nama_type',
            'received_date',
            'started_date',
            'finished_date',
            'contact',
            'customer_name',
            'email',
            'phone_number',
            'address',
            'fault_description',
            'accessories',
            'kondisi_unit',
            'repair_summary'
        )->get();
    }

    public function headings(): array
    {
        return [
            'COF-ID',
            'Brand',
            'Serial Number',
            'Product Number',
            'Nama Type',
            'Received Date',
            'Started Date',
            'Finished Date',
            'Contact',
            'Customer Name',
            'Email',
            'Phone Number',
            'Address',
            'Fault Description',
            'Accessories',
            'Kondisi Unit',
            'Repair Summary'
        ];
    }

        // 👉 Tambahkan styles
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]], // baris 1 (header) dibuat bold
        ];
}
}
