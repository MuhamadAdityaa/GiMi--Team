<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Kasir extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'code',
        'role',
        'name',
        'username',
        'no_telp',
        'password',
    ];

    public function member() {
        return $this->hasMany(Member::class, 'kasirs_id');
    }

    public function laporan() {
        return $this->hasMany(Laporan::class);
    }
}
