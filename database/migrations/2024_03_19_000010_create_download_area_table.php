<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('download_area', function (Blueprint $table) {
            $table->id('id_dokumen');
            $table->string('judul_dokumen');
            $table->string('jenis_dokumen');
            $table->string('file_dokumen');
            $table->foreignId('id_desa')->constrained('desa', 'id_desa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('download_area');
    }
}; 