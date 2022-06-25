<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    //
    protected $fillable=[
        'Nama_pegawai',
        'Alamat_pegawai',
        'Id_jabatan',
        'Kendaraan_pegawai',
        'Plat_pegawai',
        'Jammasuk_pegawai',
        'Jamkeluar_pegawai',
    ];
}
