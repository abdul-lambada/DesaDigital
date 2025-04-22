<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('desa', function (Blueprint $table) {
            $table->id('id_desa');
            $table->string('nama_desa');
            $table->text('sejarah');
            $table->text('visi_misi');
            $table->decimal('luas_wilayah', 10, 2);
            $table->integer('jumlah_penduduk');
            $table->string('peta_lokasi');
            $table->string('alamat_kantor');
            $table->string('telepon_kantor');
            $table->string('email_desa');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('desa');
    }
}; 