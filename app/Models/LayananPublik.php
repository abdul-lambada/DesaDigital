<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananPublik extends Model
{
    protected $table = 'layanan_publik';
    protected $primaryKey = 'id_layanan';
    
    protected $fillable = [
        'jenis_layanan',
        'deskripsi',
        'syarat_dokumen',
        'prosedur'
    ];
} 