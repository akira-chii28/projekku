<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    //
    protected $fillable=[
        'Nama_peng',
        'Alamat_peng',
        'Kendaraan_peng',
        'Plat_peng',
        'Ket_peng',
        'Jammasuk_peng',
        'Jamkeluar_peng',
    

    ];

}
