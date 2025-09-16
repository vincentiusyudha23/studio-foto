<?php

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
    Route::get('/details-pricelist', 'detail_pricelist')->name('details-pricelist');
    Route::get('/login', 'login_customer')->name('customer.login')->middleware('guest');
    Route::post('/request-login-customer', 'request_login_customer')->name('customer.login-request')->middleware('guest');
    Route::post('/request-logout-customer', 'request_logout_customer')->name('customer.logout-request')->middleware('role:customer');
    Route::get('/register', 'register_customer')->name('customer.register')->middleware('guest');
    Route::post('/request-register', 'request_register_customer')->name('customer.request-register')->middleware('guest');
    Route::get('/pemesanan', 'pemesanan')->name('customer.pemesanan')->middleware('role:customer');
    Route::post('/store-pemesanan', 'store_pemesanan')->name('customer.pemesanan.store')->middleware('role:customer');
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
        Route::get('/pemesanan', 'pemesanan')->name('pemesanan');
    });

    Route::post('/upload-foto-lp', [LandingPage::class, 'uploadImage'])->name('upload-foto-lp');
});

