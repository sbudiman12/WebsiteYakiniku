<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'stok',
        'gambar',
        'deskripsi',
        'kategori_id',
    ];
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorites::class);
    }
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
    public function transaksiproduk(): BelongsTo
    {
        return $this->belongsTo(Transaksi_Produk::class);
    }
    public function keranjang(): BelongsTo
    {
        return $this->belongsTo(Keranjang::class);
    }
}
