<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    protected $fillable = [
        'code',
        'name',
        'username',
        'no_telp',
        'password',
    ];

    public function member() {
        return $this->hasMany(Member::class, 'kasirs_id');
    }
}
