<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'no_telp',
        'paket',
        'tanggal_buat',
        'kasirs_id',
    ];

    public function kasir()
    {
        return $this->belongsTo(Kasir::class);
    }
}
