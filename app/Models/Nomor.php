<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomor extends Model
{
    use HasFactory;

    protected $table = 'nomor';
    protected $fillable = [
        'kode',
        'no_urut',
        'tanggal_surat',
        'keterangan',
        'tujuan',
        'jenis_surat',
        'user_id'
    ];

    public static function generateKode()
    {
        $noUrutAkhir = Nomor::orderBy('created_at','desc')->first();
        if(empty($noUrutAkhir->no_urut)){
            return '00001';
        }else{
            return sprintf("%05s",abs($noUrutAkhir->no_urut + 1));
        }
    }

    public static function incrementNoUrut()
    {
        $noUrutAkhir = Nomor::orderBy('created_at','desc')->first();
        return $noUrutAkhir->no_urut + 1;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
