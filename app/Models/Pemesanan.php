<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'tipe_paket',
        'metadata'
    ];

    protected $casts = [
        'tanggal_pelaksanaan' => 'date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
