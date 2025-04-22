<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PotensiDesa extends Model
{
    protected $table = 'potensi_desa';
    protected $primaryKey = 'id_potensi';
    
    protected $fillable = [
        'kategori_potensi',
        'nama_potensi',
        'deskripsi',
        'gambar',
        'id_desa'
    ];

    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
} 