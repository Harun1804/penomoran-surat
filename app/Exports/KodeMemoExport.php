<?php

namespace App\Exports;

use App\Models\Memo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KodeMemoExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return Memo::join("users","users.id","=","memos.user_id")->select(["kode","tanggal_memo","keterangan","tujuan","jenis_memo","users.username"])->get();
    }

    public function headings(): array
    {
        return ["kode","tanggal memo","keterangan","tujuan","jenis memo","pengguna"];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
