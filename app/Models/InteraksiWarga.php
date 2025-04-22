<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InteraksiWarga extends Model
{
    protected $table = 'interaksi_warga';
    protected $primaryKey = 'id_interaksi';
    
    protected $fillable = [
        'judul_topik',
        'deskripsi_topik',
        'tanggal_post',
        'id_warga'
    ];

    protected $casts = [
        'tanggal_post' => 'date'
    ];

    public function warga(): BelongsTo
    {
        return $this->belongsTo(Warga::class, 'id_warga');
    }
} 