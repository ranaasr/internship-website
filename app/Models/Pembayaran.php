<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'klik_pembayaran';

    protected $fillable=[
        'id_pembayaran','
         nim','
         no_invoice','
         tahun_ajaran','
         semester','
         id_komponen_pembayaran',
     ];
 
     public function mahasiswa()
     {
         return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
     }
 
     public function pembayaranDetail()
     {
         return $this->belongsTo(PembayaranDetail::class, 'id_pembayaran', 'id_pembayaran');
     }
 
 }
