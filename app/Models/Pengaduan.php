<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    
    protected $fillable = [
        'id_warga',
        'tanggal_pengaduan',
        'judul_pengaduan',
        'deskripsi_pengaduan',
        'status',
        'tanggapan'
    ];

    protected $casts = [
        'tanggal_pengaduan' => 'date'
    ];

    public function warga(): BelongsTo
    {
        return $this->belongsTo(Warga::class, 'id_warga');
    }
} 