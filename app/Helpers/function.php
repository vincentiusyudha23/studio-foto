<?php
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

if(!function_exists('getThumbnail')){
    function getThumbnail($public_id){
        return "https://res.cloudinary.com/dm2rzwrph/image/upload/w_300,h_300,c_fill/{$public_id}";
    }
}

function getStatusEnum($val){
    if($val == 'selesai'){
        return '<span class="badge text-bg-success">Selesai</span>';
    }

    return '<span class="badge text-bg-danger">Belum Selesai</span>';
}

function getMetodePembayaran($val){
    return match($val){
        '1' => 'Seabank : 901273297604 an. Tegar Wahyu Pamungkas',
        '2' => 'BRI : 023101044396507 an. Tegar Wahyu Pamungkas',
        '3' => 'DANA : 082178259142 an. Tegar Wahyu Pamungkas',
        default => 'Cash'
    };
}

function route_prefix(){
    $prefix = auth()->user()->hasRole('customer') ? 'customer.' : 'admin.';

    return $prefix;
}