<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desa';
    protected $primaryKey = 'id_desa';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'nama_desa',
        'kode_desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'alamat',
        'telepon',
        'email',
        'website',
        'logo',
        'foto_kantor',
        'visi',
        'misi',
        'sejarah',
        'geografis',
        'demografis',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id_desa';
    }

    public function pemerintahan(): HasMany
    {
        return $this->hasMany(Pemerintahan::class, 'id_desa');
    }

    public function wilayah(): HasMany
    {
        return $this->hasMany(Wilayah::class, 'id_desa');
    }

    public function potensiDesa(): HasMany
    {
        return $this->hasMany(PotensiDesa::class, 'id_desa');
    }

    public function berita(): HasMany
    {
        return $this->hasMany(Berita::class, 'id_desa');
    }

    public function galeri(): HasMany
    {
        return $this->hasMany(Galeri::class, 'id_desa');
    }

    public function downloadArea(): HasMany
    {
        return $this->hasMany(DownloadArea::class, 'id_desa');
    }

    public function transparansiAnggaran(): HasMany
    {
        return $this->hasMany(TransparansiAnggaran::class, 'id_desa');
    }
}
