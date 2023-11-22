<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendapatan extends Model
{
    use HasFactory;

    protected $fillable = ['umkm_id','pendapatan'];

    public function umkm(): BelongsTo
    {
        return $this->belongsTo(Umkm::class);
    }
}
