<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Prodi extends Model
{
  
    use HasFactory;
    protected $table = 'tbl_mst_prodi';
    protected $primarykey = 'id_prodi';

    protected $fillable=[
    'nama_prodi',
    ];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'id_prodi', 'id_prodi');
    }

}
