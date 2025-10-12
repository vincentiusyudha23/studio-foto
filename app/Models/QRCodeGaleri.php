<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCodeGaleri extends Model
{
    use HasFactory;

    protected $table = 'q_r_code_galeris';

    protected $fillable = [
        'pesanan_id',
        'link',
        'status',
        'expired_at'
    ];
}
