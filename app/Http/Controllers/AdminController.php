<?php

namespace App\Http\Controllers;

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
}
