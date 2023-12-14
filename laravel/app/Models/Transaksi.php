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
}
