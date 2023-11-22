<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable =['nib','nama_usaha','pemilik_usaha','jenis','alamat','no_telpon','media_promosi'];

    public function produk(): HasMany
    {
        return $this->hasMany(Produk::class);
    }

    public function kegiatan(): HasMany
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function pendapatan(): HasMany
    {
        return $this->hasMany(Pendapatan::class);
    }
}
