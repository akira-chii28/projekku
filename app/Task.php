<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable=[
        'Nama_tugas',
        'Id_kategori',
        'Ket_tugas',
        'Tempat_tugas',
        'Jenis_Kendaraan',
        'No_Polisi',



    ];
}
