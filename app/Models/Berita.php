<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berita extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    
    protected $fillable = [
        'judul_berita',
        'isi_berita',
        'tanggal_publikasi',
        'penulis',
        'gambar',
        'id_desa'
    ];

    protected $casts = [
        'tanggal_publikasi' => 'date'
    ];

    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
} 