<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanans';
    protected $fillable = [
        'nama',
        'no_hp',
        'email',
        'tanggal_pelaksanaan',
        'user_id',
        'tipe_paket'
    ];

    protected $casts = [
        'tanggal_pelaksanaan' => 'date'
    ];
}
