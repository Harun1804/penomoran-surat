<?php

namespace App\Exports;

use App\Models\Nomor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KodeSuratExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return Nomor::join("users","users.id","=","nomor.user_id")->select(["kode","tanggal_surat","keterangan","tujuan","jenis_surat","users.username"])->get();
    }

    public function headings(): array
    {
        return ["kode","tanggal surat","keterangan","tujuan","jenis surat","pengguna"];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
