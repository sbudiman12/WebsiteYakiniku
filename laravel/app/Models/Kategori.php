<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_name'
    ];
    public function produks(): HasMany
    {
        return $this->hasMany(Produk::class);
    }

}
