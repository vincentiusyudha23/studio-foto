<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'metadata',
        'status'
    ];

    protected $casts = [
        'tanggal_pelaksanaan' => 'date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function bookingFormattedId()
    {
        return $this->created_at->format('dmy').'00'.$this->id;
    }

    public function foto(): HasMany
    {
        return $this->hasMany(Foto::class, 'pesanan_id', 'id');
    }
}
