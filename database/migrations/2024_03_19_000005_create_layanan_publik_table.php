<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('layanan_publik', function (Blueprint $table) {
            $table->id('id_layanan');
            $table->string('jenis_layanan');
            $table->text('deskripsi');
            $table->text('syarat_dokumen');
            $table->text('prosedur');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('layanan_publik');
    }
}; 