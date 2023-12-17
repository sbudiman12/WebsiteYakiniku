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
        'produk_id',
        'jumlah'
        // tambahkan atribut lainnya sesuai kebutuhan
    ];
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
