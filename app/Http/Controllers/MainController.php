<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function landing_page()
    {
        $photos = [
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596408/lp_20_isspkl.jpg',
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596408/lp_21_lc3rrf.jpg',
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596400/lp_17_ca2syr.jpg',
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596399/lp_16_p5gbac.jpg',
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596393/lp_18_wafbkf.jpg',
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596393/lp_19_osffwm.jpg',
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596386/lp_14_siqmah.jpg',
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596384/lp_13_x8avk8.jpg',
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596380/lp_15_sbjwkq.jpg',
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596370/lp_3_gk7k1v.jpg',
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596369/lp_6_m9uwv4.jpg',
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596367/lp_9_uv4azr.jpg',
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596364/lp_4_xvnwbc.jpg',
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596359/lp_2_qlvir2.jpg',
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596354/lp_8_uacvq7.jpg',
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596348/lp_7_fc6eow.jpg',
            'https://res.cloudinary.com/dm2rzwrph/image/upload/w_500,c_fill,g_auto,q_auto,f_webp/v1754596169/lp_1_fkuopf.jpg'
        ];

        return view('welcome', compact('photos'));
    }

    public function detail_pricelist()
    {
        return view('detail_pricelist');
    }

    public function login_customer()
    {
        return view('customer.auth.login');
    }

    public function request_login_customer(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        
        if(Auth::attempt($credentials)){
            $user = Auth::user();

            if($user->role !== 'customer'){
                Auth::logout();

                return redirect()->back()->with('error', 'Akun tidak valid');
            }

            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return redirect()->back()->with('error', 'Email/Password tidak ditemukan');
    }

    public function request_logout_customer(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing-page');
    }

    public function register_customer()
    {
        return view('customer.auth.register');
    }

    public function request_register_customer(Request $request)
    {
        $request->validate([
            'name_front' => 'required',
            'name_back' => 'nullable',
            'email' => 'required',
            'no_hp' => 'required',
            'password' => 'required'
        ]);

        try{
            DB::beginTransaction();
            
            $user = User::create([
                'nama_depan' => $request->name_front,
                'nama_belakang' => $request->name_back ?? null,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'password' => Hash::make($request->password),
                'role' => 'customer'
            ]);

            $user->assignRole('customer');

            DB::commit();
            return back()->with('success', 'Berhasil mendaftarkan akun.');
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function pemesanan()
    {
        return view('customer.pemesanan');
    }

    public function store_pemesanan(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'tipe_paket' => 'required',
            'tanggal' => 'required'
        ]);

        try{
            DB::beginTransaction();

            Pemesanan::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'tipe_paket' => $request->tipe_paket,
                'tanggal_pelaksanaan' => $request->tanggal,
                'user_id' => auth()->user()->id 
            ]);

            DB::commit();
            return back()->with('success', 'Berhasil memesan paket, admin akan segera mengeceknya');
        }catch(\Exception $e){
            DB::rollback();
            return back()->with('error', $e->getMessage());
        }
    }
}
