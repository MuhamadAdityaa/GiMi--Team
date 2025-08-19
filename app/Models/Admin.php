<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'code',
        'name',
        'username',
        'no_telp',
        'password',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($admin) {
    //         $lastId = self::max('id') ?? 0;
    //         $admin->code = '101' . ($lastId + 1);
    //     });
    // }
}
