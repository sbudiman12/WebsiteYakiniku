<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'transaction_id',
        'harga',
        'jumlah',
    ];
}
