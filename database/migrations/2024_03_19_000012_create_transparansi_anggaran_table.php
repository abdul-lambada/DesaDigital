<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transparansi_anggaran', function (Blueprint $table) {
            $table->id('id_anggaran');
            $table->year('tahun_anggaran');
            $table->text('rincian_anggaran');
            $table->text('realisasi_anggaran');
            $table->string('laporan_keuangan');
            $table->foreignId('id_desa')->constrained('desa', 'id_desa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transparansi_anggaran');
    }
}; 