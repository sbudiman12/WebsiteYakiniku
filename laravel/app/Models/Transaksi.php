<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'bukti_transfer',
        'user_id',
        'status_id',
        'delivery_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);

    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function transaksi_produk() {
        return $this->hasMany(Transaksi_Produk::class);
    }
}
