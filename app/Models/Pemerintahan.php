<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemerintahan extends Model
{
    protected $table = 'pemerintahan';
    protected $primaryKey = 'id_pejabat';
    
    protected $fillable = [
        'nama_pejabat',
        'jabatan',
        'nip',
        'telepon',
        'foto',
        'id_desa'
    ];

    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
} 