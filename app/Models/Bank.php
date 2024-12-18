<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'tbl_bank';
    protected $primarykey = 'id_bank';

    protected $fillable=[
    'nama_bank',
    ];

    public function pembayaranDetail()
    {
        return $this->hasMany(PembayaranDetail::class, 'id_bank', 'id_bank');
    }
}