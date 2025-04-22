<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemerintahan', function (Blueprint $table) {
            $table->id('id_pejabat');
            $table->string('nama_pejabat');
            $table->string('jabatan');
            $table->string('nip');
            $table->string('telepon');
            $table->string('foto');
            $table->foreignId('id_desa')->constrained('desa', 'id_desa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemerintahan');
    }
}; 