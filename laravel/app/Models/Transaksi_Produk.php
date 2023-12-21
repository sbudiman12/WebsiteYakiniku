<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'transaksi_id',
        'harga',
        'jumlah',
    ];

    public function transaksi() {
        return $this->belongsTo(Transaksi::class);
    }
    public function produk() {
        return $this->belongsTo(Produk::class);
    }
}
