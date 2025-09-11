<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'kasir_id',
        'member_id',
        'tanggal',
    ];

    public function kasir() {
        return $this->belongsTo(Kasir::class);
    }

    public function member() {
        return $this->belongsTo(Member::class);
    }
}
