<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_005 extends Model
{
    //
    protected $fillable=[
        'Nama_supir',
        'Id_kategori',
        'Kendaraan_supir',
        'Plat_supir',
        'Jenis_barang',
        'Jammasuk_supir',
        'Jamkeluar_supir',
    

    ];
}
