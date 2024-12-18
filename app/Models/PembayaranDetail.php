<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranDetail extends Model
{
    protected $table = 'klik_pembayaran_detail';
    protected $primarykey = 'id_pembayaran';

    protected $fillable=[
        'nilai_bayar','
        id_bank','
        status_bayar','
        tgl_update','
        deskripsiPanjang'
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_bank', 'id_bank');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_pembayaran', 'id_pembayaran');
    }

}
