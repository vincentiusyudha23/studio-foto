<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceCustomer extends Model
{
    use HasFactory;

    protected $table = 'device_customers';
    protected $fillable = [
        'device_id',
        'pesanan_id',
        'count'
    ];
}
