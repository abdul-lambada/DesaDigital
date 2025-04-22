<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('potensi_desa', function (Blueprint $table) {
            $table->id('id_potensi');
            $table->string('kategori_potensi');
            $table->string('nama_potensi');
            $table->text('deskripsi');
            $table->string('gambar');
            $table->foreignId('id_desa')->constrained('desa', 'id_desa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('potensi_desa');
    }
}; 