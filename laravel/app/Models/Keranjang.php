<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keranjang extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_harga',
        // tambahkan atribut lainnya sesuai kebutuhan
    ];
    public function produks(): HasMany
    {
        return $this->hasMany(Produk::class);
    }

}
