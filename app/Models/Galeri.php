<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';
    protected $primaryKey = 'id_media';
    
    protected $fillable = [
        'judul',
        'deskripsi',
        'kategori',
        'foto',
        'jenis_media',
        'url_media',
        'tanggal_upload',
        'id_desa'
    ];

    protected $casts = [
        'tanggal_upload' => 'date'
    ];

    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
} 