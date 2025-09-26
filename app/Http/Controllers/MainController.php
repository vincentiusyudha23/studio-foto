<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
        $description = '
            <p>Mohon untuk dibaca dan dipahami. jika ada yang kurang dipahami, silahkan hubungi admin.</p>

            <ul>
                <li>Janji pertemuan secara langsung hanya dapat dilakukan setelah melakukan konfirmasi terlebih dahulu.</li>
                <li>Pembayaran dapat dilakukan melalui COD atau transfer atas nama yang diberikan oleh admin aster visualism.</li>
                <li>Penambahan lokasi, jam, dan wisudawan diluar perjanjian dikenakan biaya tambahan. info detail hubungi admin.</li>
                <li>Jika terdapat biaya pada lokasi pemotretan, maka biaya tersebut ditanggung oleh client.</li>
                <li>Booking = Pengisian form dan dengan pembayaran dp.</li>
                <li>Pembayaran hanya dilakukan 1x yaitu sebelum/setelah pemotretan selesai dilakukan. (untuk jasa foto & Video)</li>
                <li>Pembayaran hanya dilakukan 1x yaitu setelah Make-up selesai dilakukan. (untuk jasa make-up)</li>
                <li>Pembatalan sepihak dari client tanpa alasan yang jelas akan di viralkan melalui media sosial kami dan client tidak berhak untuk menuntut kembali dalam bentuk apapun kepada pihak yang berwajib.</li>
                <li>Pembatalan sepihak dari client tanpa alasan yang jelas yang telah melakukan pembayaran tidak akan di viralkan namun dp hangus.</i>
                <li>Pembatalan dari client dengan alasan yang jelas hanya dapat dilakukan paling lambat h-3 dari jadwal yang disepakati. (kecuali kematian, kecelakaan atau musibah besar)</li>
                <li>Pembatalan sepihak dari vendor dengan atau tanpa alasan yang jelas dp dikembalikan 2x lipat dan pihak yang dirugikan berhak mem-viralkan vendor. Vendor tidak berhak untuk menuntut kembali dalam bentuk apapun kepada pihak yang berwajib. (kecuali kematian, kecelakaan atau musibah besar)</li>
                <li>Pemotretan hanya berlaku outdoor.</li>
                <li>Info lainnya silahkan hubungi admin di nomor yang tertera.</li>
                <li>Booking = membaca, memahami dan menyetujui seluruh s&k yang berlaku.</li>
            </ul>
            
            <p>
                Jangan lupa follow ig dan tiktok Aster Visualism di @aster.visualism <br>
                Contact us on : 0896 0806 9631 - Aster Visualism
            </p>
        ';
        return view('customer.pemesanan', compact('description'));
    }

    public function store_pemesanan(Request $request)
    {
        $validate = $request->validate([
            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'instagram' => 'required',
            'gelar' => 'nullable',
            'univ' => 'required',
            'tgl_potret' => 'required',
            'jam_potret' => 'required',
            'lokasi' => 'required',
            'link_lokasi' => 'required',
            'jasa_jasa' => 'required|array',
            'paket' => 'required',
            'info_paket_pilihan' => 'required',
            'term_condition' => 'required',
            'pembayaran' => 'required',
            'bukti_tf' => 'required_if:pembayaran,1,2,3',
        ]);

        try{
            DB::beginTransaction();

            $user = auth()->user();

            if($request->has('bukti_tf')){
                $image = $request->bukti_tf;
                $cloud = Cloudinary::upload($image->getRealPath(), [
                    'folder' => 'Bukti Transfer'
                ]);

                $validate['bukti_tf'] = $cloud->getSecurePath();
            }

            Pemesanan::create([
                'nama' => $request->nama_lengkap,
                'email' => $user->email,
                'no_hp' => $request->no_hp,
                'tipe_paket' => $request->paket,
                'tanggal_pelaksanaan' => $request->tgl_potret,
                'metadata' => json_encode($validate),
                'user_id' => auth()->user()->id 
            ]);

            DB::commit();
            return response()->json([
                'type' => 'success',
                'msg' => 'Pemesanan mu berhasil dikirim, admin akan segera mengeceknya, terimakasih!'
            ]);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json([
                'type' => 'error',
                'msg' => $e->getMessage()
            ]);
        }
    }
}
