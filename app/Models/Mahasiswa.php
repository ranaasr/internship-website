<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'tbl_mahasiswa';
    protected $primarykey = 'nim';

    protected $fillable=[
        'nama','email','no_invoice','id_prodi',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'nim', 'nim');
    }

}
