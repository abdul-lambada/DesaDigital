<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wilayah extends Model
{
    protected $table = 'wilayah';
    protected $primaryKey = 'id_wilayah';
    
    protected $fillable = [
        'nama_wilayah',
        'kode_wilayah',
        'id_desa'
    ];

    public function desa(): BelongsTo
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

    public function warga(): HasMany
    {
        return $this->hasMany(Warga::class, 'id_wilayah');
    }
}