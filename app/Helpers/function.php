<?php
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

if(!function_exists('getThumbnail')){
    function getThumbnail($public_id){
        return "https://res.cloudinary.com/dm2rzwrph/image/upload/w_300,h_300,c_fill/{$public_id}";
    }
}