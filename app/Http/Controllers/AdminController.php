<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function request_login_admin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        if(Auth::attempt($credentials)){
            $user = Auth::user();

            if($user->role !== 'admin'){
                Auth::logout();

                return redirect()->back()->with('error', 'Akun tidak valid');
            }

            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->back()->with('error', 'Email/Password tidak ditemukan');
    }

    public function request_logout_admin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing-page');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function landing_page()
    {
        return view('admin.landing_page.index');
    }

    public function galeri()
    {
        return view('admin.galeri.index');
    }

    public function client()
    {
        return view('admin.client.index');
    }

    public function pemesanan()
    {
        $pemesanan = Pemesanan::latest()->get();
        return view('admin.pemesanan.index', compact('pemesanan'));
    }

    public function pemesanan_view($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        if($pemesanan->dilihat == 0){
            $pemesanan->dilihat = 1;
            $pemesanan->save();
        }
        
        return view('admin.pemesanan.pesanan-view', compact('pemesanan'));
    }

    public function kelola_foto_pesanan($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        return view('admin.pemesanan.kelola-foto', compact('pemesanan'));
    }

    public function client_view($id)
    {
        $user = User::find($id);

        $total_foto = Foto::whereIn('pesanan_id', $user->pemesanan()->pluck('id')->toArray())->count();

        return view('admin.client.client-view', compact('user', 'total_foto'));
    }
}
