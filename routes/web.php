<?php

use App\Livewire\KelolaFoto;
use App\Livewire\GalleryPage;
use App\Livewire\LandingPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::controller(MainController::class)->group(function(){
    Route::get('/', 'landing_page')->name('landing-page');
    Route::get('/details-pricelist/{type}', 'detail_pricelist')->name('details-pricelist');
    Route::get('/login', 'login_customer')->name('customer.login')->middleware('guest');
    Route::post('/request-login-customer', 'request_login_customer')->name('customer.login-request')->middleware('guest');
    Route::get('/register', 'register_customer')->name('customer.register')->middleware('guest');
    Route::post('/request-register', 'request_register_customer')->name('customer.request-register')->middleware('guest');

    Route::get('/galeri-umum/{id}', 'galeri_umum')->name('customer.galeri-umum');
    Route::get('/download-foto-umum', 'download_foto_umum')->name('customer.galeri-umum.download');

    Route::middleware('role:customer')->group(function(){
        Route::get('/formulir/{type}', 'pemesanan')->name('customer.pemesanan');
        Route::get('/riwayat-pemesanan', 'riwayat_pemesanan')->name('customer.riwayat-pemesanan');
        Route::get('/pemesanan/{id}', 'pemesanan_view')->name('customer.pemesanan-view');
        Route::get('/pemesanan/{id}/lihat-foto', 'lihat_foto')->name('customer.lihat-foto');
        Route::get('/galeri-saya', 'galeri_saya')->name('customer.galeri-saya');
        Route::get('/download-foto/{id}', 'download_foto')->name('customer.download_foto');
        Route::post('/store-pemesanan', 'store_pemesanan')->name('customer.pemesanan.store');
        Route::post('/request-logout-customer', 'request_logout_customer')->name('customer.logout-request');
    });
});

Route::controller(AdminController::class)->prefix('admin')->name('admin.')->group(function(){
    Route::get('/', 'login')->name('login')->middleware('guest');
    Route::post('/request-login', 'request_login_admin')->name('request-login')->middleware('guest');
});

Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function(){

    Route::controller(AdminController::class)->group(function(){
        Route::post('/logout', 'request_logout_admin')->name('logout');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/landing-page', 'landing_page')->name('landing-page');
        Route::get('/galeri', 'galeri')->name('galeri');
        Route::get('/client', 'client')->name('client');
        Route::get('/pemesanan', 'pemesanan')->name('pemesanan');
        Route::get('/pemesanan/{id}', 'pemesanan_view')->name('pemesanan-view');
        Route::get('/pemesanan/{id}/kelola-foto', 'kelola_foto_pesanan')->name('pemesanan.kelola-foto');
    });

    Route::post('/upload-foto-lp', [LandingPage::class, 'uploadImage'])->name('upload-foto-lp');
    Route::post('/upload-foto-gl', [GalleryPage::class, 'uploadImage'])->name('upload-foto-gl');
    Route::post('/upload-foto-ps', [KelolaFoto::class, 'uploadImage'])->name('upload-foto-ps');
});

