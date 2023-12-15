<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'role_id',
        'is_login',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function favorites() {
        return $this->hasMany(Favorites::class);
    }

    public function transaksis() {
        return $this->hasMany(Transaksi::class);
    }

    public function keranjang() {
        return $this->hasMany(Keranjang::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }


    public function isAdmin(){
        if ($this->role_id == 1) {
            return true;
        }
        return false;
    }

    public function isMember(){
        if ($this->role_id == 2) {
            return true;
        }
        return false;
    }

}
