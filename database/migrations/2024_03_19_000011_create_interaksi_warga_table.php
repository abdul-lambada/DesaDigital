<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('interaksi_warga', function (Blueprint $table) {
            $table->id('id_interaksi');
            $table->string('judul_topik');
            $table->text('deskripsi_topik');
            $table->date('tanggal_post');
            $table->foreignId('id_warga')->constrained('warga', 'id_warga')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('interaksi_warga');
    }
}; 