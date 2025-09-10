<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{


    public function kasir() {
        return $this->belongsTo(Kasir::class);
    }

    public function member() {
        return $this->belongsTo(Member::class);
    }
}
