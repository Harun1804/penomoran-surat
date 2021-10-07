<?php

namespace App\Imports;

use App\Models\Memo;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KodeMemoImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Memo([
            'kode' => Memo::generateKode(),
            'no_urut' => Memo::incrementNoUrut(),
            'tanggal_memo' => Carbon::now(),
            'keterangan' => $row['keterangan'],
            'tujuan' => $row['tujuan'],
            'jenis_memo' => $row['jenis_memo'],
            'user_id' => auth()->user()->id
        ]);
    }
}
