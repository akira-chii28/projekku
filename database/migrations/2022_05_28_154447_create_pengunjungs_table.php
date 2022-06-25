<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengunjungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengunjungs', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_peng');
            $table->string('Alamat_peng');
            $table->string('Kendaraan_peng');
            $table->string('Plat_peng');
            $table->string('Jammasuk_peng');
            $table->string('Jamkeluar_peng');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengunjungs');
    }
}
