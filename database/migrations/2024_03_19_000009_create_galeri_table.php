<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('galeri', function (Blueprint $table) {
            $table->id('id_media');
            $table->string('jenis_media');
            $table->string('judul_media');
            $table->string('url_media');
            $table->date('tanggal_upload');
            $table->foreignId('id_desa')->constrained('desa', 'id_desa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('galeri');
    }
}; 