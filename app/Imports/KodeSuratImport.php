<?php

namespace App\Imports;

use App\Models\Nomor;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KodeSuratImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Nomor([
            'kode' => Nomor::generateKode(),
            'no_urut' => Nomor::incrementNoUrut(),
            'tanggal_surat' => Carbon::now(),
            'keterangan' => $row['keterangan'],
            'tujuan' => $row['tujuan'],
            'jenis_surat' => $row['jenis_surat'],
            'user_id' => auth()->user()->id
        ]);
    }
}
