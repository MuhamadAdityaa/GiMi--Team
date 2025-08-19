<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
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
