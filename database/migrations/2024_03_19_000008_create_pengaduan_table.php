<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->foreignId('id_warga')->constrained('warga', 'id_warga')->onDelete('cascade');
            $table->date('tanggal_pengaduan');
            $table->string('judul_pengaduan');
            $table->text('deskripsi_pengaduan');
            $table->string('status');
            $table->text('tanggapan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
}; 