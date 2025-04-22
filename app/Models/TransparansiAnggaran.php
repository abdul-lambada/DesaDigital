<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransparansiAnggaran extends Model
{
    protected $table = 'transparansi_anggaran';
    protected $primaryKey = 'id_anggaran';
    
    protected $fillable = [
        'tahun_anggaran',
        'rincian_anggaran',
        'realisasi_anggaran',
        'laporan_keuangan',
        'id_desa'
    ];

    protected $casts = [
        'tahun_anggaran' => 'integer'
    ];

    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
} 