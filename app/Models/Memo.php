<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Memo extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'no_urut',
        'tanggal_memo',
        'keterangan',
        'tujuan',
        'jenis_memo',
        'user_id'
    ];

    public static function generateKode()
    {
        $noUrutAkhir = Memo::orderBy('id','desc')->first();
        if($noUrutAkhir == null){
            return '00001';
        }else{
            return sprintf("%05s",abs($noUrutAkhir->no_urut + 1));
        }
    }

    public static function incrementNoUrut()
    {
        $noUrutAkhir = Memo::orderBy('id','desc')->first();
        if ($noUrutAkhir == null) {
            return 0;
        }else{
            return $noUrutAkhir->no_urut + 1;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
