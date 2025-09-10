<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'role',
        'name',
        'username',
        'no_telp',
        'password',
        'paket',
        'kode_qr',
        'tanggal_buat',
        'kasirs_id',
    ];

    protected $casts = [
        'paket' => 'integer',
    ];

    public function kasir()
    {
        return $this->belongsTo(Kasir::class);
    }

    public function laporan() {
        return $this->hasMany(Laporan::class);
    }
}
