<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class Member extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    public function getSisaHariAttribute()
{
        $today = Carbon::now();
        $endDate = Carbon::parse($this->tanggal_berakhir);
        $diff = $today->diffInDays($endDate, False);

        return $diff;
    }

    public function getTanggalBerakhirTextAttribute()
    {
        return Carbon::parse($this->tanggal_berakhir)->format('d F Y');
    }

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
        'tanggal_update',
        'tanggal_berakhir',
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
