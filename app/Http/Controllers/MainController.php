<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Pemesanan;
use App\Models\GalleryPages;
use App\Models\LandingPages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class MainController extends Controller
{
    public function landing_page()
    {
        $photos = LandingPages::all();

        $myGallery = GalleryPages::all();

        return view('welcome', compact('photos', 'myGallery'));
    }

    public function detail_pricelist($type)
    {
        if($type == 'graduation'){
            $data = [
                'title' => 'Graduation Photo & Video',
                'type' => [
                    'single' => [
                        'basic' => [
                            'title' => 'Basic Package',
                            'subtitle' => 'Ideal for Smart Budgeting',
                            'price' => 'Rp 350k',
                            'description' => [
                                'Foto Outdoor (1 wisudawan/ti)',
                                'Foto Pose, Keluarga, & Teman',
                                'Durasi 50 menit + 10 menit',
                                '20 Foto Edit',
                                'Semua File Foto (Kirim Langsung)',
                            ]
                        ],
                        'standard' => [
                            'title' => 'Standard Package',
                            'subtitle' => 'Perfect for Optimal Budgeting',
                            'price' => 'Rp 450k',
                            'description' => [
                                'Foto Outdoor (1 wisudawan/ti)',
                                'Foto Pose, Keluarga, & Teman',
                                'Durasi <strong>80 menit</strong> + 10 menit',
                                '<strong>Unlimited</strong> Foto Edit',
                                'Semua File Foto (Kirim Langsung)',
                            ]
                        ],
                        'premium' => [
                            'title' => 'Premium Package',
                            'subtitle' => 'For a Seamless Experience and Luxury Wedding',
                            'price' => 'Rp 800k',
                            'description' => [
                                'Foto Outdoor (1 wisudawan/ti)',
                                'Foto Pose, Keluarga, & Teman',
                                'Durasi <strong>80 menit</strong> + 10 menit',
                                '<strong>Cetak Foto 16r + Bingkai (1pcs)</strong>',
                                '<strong>Cetak Foto 12r + Bingkai (1pcs)</strong>',
                                '<strong>Cetak Foto 4r (5pcs)</strong>',
                                '<strong>Unlimited</strong> Foto Edit',
                                'Semua File Foto (Kirim Langsung)',
                            ]
                        ]
                    ],
                    'couple' => [
                        'basic' => [
                            'title' => 'Basic Package',
                            'subtitle' => 'Ideal for Smart Budgeting',
                            'price' => 'Rp 400k',
                            'description' => [
                                'Foto Outdoor (2 wisudawan/ti)',
                                'Foto Pose, Keluarga, & Teman',
                                'Durasi 50 menit + 10 menit',
                                '30 Foto Edit',
                                'Semua File Foto (Kirim Langsung)',
                            ]
                        ],
                        'standard' => [
                            'title' => 'Standard Package',
                            'subtitle' => 'Perfect for Optimal Budgeting',
                            'price' => 'Rp 550k',
                            'description' => [
                                'Foto Outdoor (2 wisudawan/ti)',
                                'Foto Pose, Keluarga, & Teman',
                                'Durasi <strong>80 menit</strong> + 10 menit',
                                '<strong>Unlimited</strong> Foto Edit',
                                'Semua File Foto (Kirim Langsung)',
                            ]
                        ],
                        'premium' => [
                            'title' => 'Premium Package',
                            'subtitle' => 'For a Seamless Experience and Luxury Wedding',
                            'price' => 'Rp 1250k',
                            'description' => [
                                'Foto Outdoor (2 wisudawan/ti)',
                                'Foto Pose, Keluarga, & Teman',
                                'Durasi <strong>80 menit</strong> + 10 menit',
                                '<strong>Cetak Foto 16r + Bingkai (1pcs)</strong>',
                                '<strong>Cetak Foto 12r + Bingkai (1pcs)</strong>',
                                '<strong>Cetak Foto 4r (5pcs)</strong>',
                                '<strong>Unlimited</strong> Foto Edit',
                                'Semua File Foto (Kirim Langsung)',
                            ]
                        ]
                    ],
                    'group' => [
                        'exclusive' => [
                            'title' => 'Exclusive Package',
                            'subtitle' => 'Ideal for Smart Budgeting',
                            'price' => 'Rp 150k / orang',
                            'description' => [
                                'Foto Outdoor (Pose & Group)',
                                '3-5 wisudawan/ti',
                                'Durasi 50 menit + 10 menit',
                                '30 Foto Edit',
                                'Semua File Foto (Kirim Langsung)',
                            ]
                        ],
                        'dynamic' => [
                            'title' => 'Dynamic Package',
                            'subtitle' => 'Perfect for Optimal Budgeting',
                            'price' => 'Rp 120k / orang',
                            'description' => [
                                'Foto Outdoor (Pose & Group)',
                                'Min. 6-8 wisudawan/ti',
                                'Durasi <strong>80 menit</strong> + 10 menit',
                                '<strong>Unlimited</strong> Foto Edit',
                                'Semua File Foto (Kirim Langsung)',
                            ]
                        ],
                        'energetic' => [
                            'title' => 'Energetic Package',
                            'subtitle' => 'For a Seamless Experience and Luxury Wedding',
                            'price' => 'Rp 100k / orang',
                            'description' => [
                                'Foto Outdoor (Pose & Group)',
                                'Min. 9-12 wisudawan/ti',
                                'Durasi <strong>80 menit</strong> + 10 menit',
                                '<strong>Unlimited</strong> Foto Edit',
                                'Semua File Foto (Kirim Langsung)',
                            ]
                        ]
                    ],
                    'video' => [
                        'single' => [
                            'title' => 'Single Grads',
                            'subtitle' => 'Ideal for Smart Budgeting',
                            'price' => 'Rp 500k',
                            'description' => [
                                'Video Cinematic 1-3 menit',
                                'Pose sendiri & teman (diarahkan)',
                                'Take Video 50 menit',
                                'Take Foto 10 Menit',
                            ]
                        ],
                        'couple' => [
                            'title' => 'Couple Grads',
                            'subtitle' => 'Perfect for Optimal Budgeting',
                            'price' => 'Rp 500k',
                            'description' => [
                                'Video Cinematic 1-3 menit',
                                'Pose sendiri & teman (diarahkan)',
                                'Take Video 50 menit',
                                'Take Foto 10 Menit',
                                '<strong>2 wisudawan/ti</strong>',
                            ]
                        ],
                        'group' => [
                            'title' => 'Groups Grads',
                            'subtitle' => 'For a Seamless Experience and Luxury Wedding',
                            'price' => 'Rp 150k / orang',
                            'description' => [
                                'Video Cinematic 1-3 menit',
                                'Pose sendiri & teman (diarahkan)',
                                'Take Video 50 menit',
                                '<strong>5-10 wisudawan/ti</strong>',
                            ]
                        ]
                    ],
                    'bundling' => [
                        'bundling_1' => [
                            'title' => 'Bundling I',
                            'subtitle' => 'Foto + Video Wisuda',
                            'price' => 'Rp 500k',
                            'description' => [
                                'Video Cinematic 1-3 menit',
                                'Foto wisuda (60 minutes)',
                                'Unlmited Photo & Edit',
                                'Foto single pose, family & friends',
                            ]
                        ],
                        'bundling_2' => [
                            'title' => 'Bundling II',
                            'subtitle' => 'Foto + Make-Up Wisuda',
                            'price' => 'Rp 700k',
                            'description' => [
                                'Make-Up Wisuda (include softlens & Nail Extension)',
                                'Graduation outdoor (60 minutes)',
                                'Unlmited Photo & Edit',
                                'Semua file foto (kirim sameday)',
                                'Foto single pose, family & friends',
                            ]
                        ],
                        'bundling_3' => [
                            'title' => 'Bundling III',
                            'subtitle' => 'Foto + Video + Make-Up Wisuda',
                            'price' => 'Rp 1100k',
                            'description' => [
                                'Make-Up Wisuda (include softlens & Nail Extension)',
                                'Video Cinematic 1-3 menit',
                                'Foto Wisuda (60 minutes)',
                                'Unlmited Photo & Edit',
                                'Semua file foto (kirim sameday)',
                                'Foto single pose, family & friends',
                            ]
                        ]
                    ]
                ]
            ];
        }

        if($type == 'wedding'){
            $data = [
                'title' => 'Wedding & Pre-Wedding',
                'type' => [
                    'photography' => [
                        'basic' => [
                            'title' => 'Basic Package',
                            'subtitle' => 'Ideal for Smart Budgeting',
                            'price' => 'Rp 1.7jt',
                            'description' => [
                                'Akad & Resepsi',
                                'Foto Pajangan Eksklusif',
                                'Album 20 Halaman + Foto 120pcs',
                                'Undangan Digital',
                                'Semua file foto (kirim langsung)',
                            ]
                        ],
                        'standard' => [
                            'title' => 'Standard Package',
                            'subtitle' => 'Perfect for Optimal Budgeting',
                            'price' => 'Rp 2.5jt',
                            'description' => [
                                '<strong>Pre-Wedding Photo Outdoor</strong>',
                                'Akad, Resepsi & <strong>Babako</strong>',
                                'Foto Pajangan Eksklusif <strong>(2pcs)</strong>',
                                'Album 20 Halaman + Foto 120pcs',
                                'Undangan Digital',
                                'Semua file foto (kirim langsung)',
                            ]
                        ],
                        'premium' => [
                            'title' => 'Premium Package',
                            'subtitle' => 'For a Seamless Experience and Luxury Wedding',
                            'price' => 'Rp 4.2jt',
                            'description' => [
                                'Pre-Wedding Photo Outdoor',
                                '<strong>Acara Double</strong> ditempat Wanita & Pria',
                                'Akad, Resepsi & Babako',
                                '<strong>Foto Latar Biru (Free Cetak 30pcs)</strong>',
                                'Foto Pajangan Eksklusif <strong>(4pcs)</strong>',
                                'Album + Foto <strong>(2set)</strong>',
                                'Undangan Digital <strong>(2set)</strong>',
                            ]
                        ]
                    ],
                    'videography' => [
                        'basic' => [
                            'title' => 'Basic Package',
                            'subtitle' => 'Ideal for Smart Budgeting',
                            'price' => 'Rp 1.3jt',
                            'description' => [
                                'Akad & Resepsi <strong>(oneday)</strong>',
                                'Video Cinematic 3-5 menit',
                                'Video Reels 30-60 detik (hari acara)',
                                'Undangan Digital',
                            ]
                        ],
                        'standard' => [
                            'title' => 'Standard Package',
                            'subtitle' => 'Perfect for Optimal Budgeting',
                            'price' => 'Rp 2.5jt',
                            'description' => [
                                'Akad, Resepsi & <strong>Babako/Baarak</strong>',
                                '<strong>Video Dokumentasi Acara 5-8 menit</strong>',
                                'Video Cinematic 3-5 menit',
                                'Video Reels 30-60 detik (hari acara)',
                                'Undangan Digital',
                            ]
                        ],
                        'premium' => [
                            'title' => 'Premium Package',
                            'subtitle' => 'For a Seamless Experience and Luxury Wedding',
                            'price' => 'Rp 4jt',
                            'description' => [
                                'Akad, Resepsi, <strong>Babako/Baarak & Pre-Wedding</strong>',
                                '<strong>Video Dokumentasi Acara 5-8 menit</strong>',
                                'Video Cinematic <strong>Love Story</strong> 5-8 menit',
                                '<strong>Camera Drone View</strong>',
                                'Video Reels 30-60 detik (hari acara)',
                                'Undangan Digital',
                            ]
                        ]
                    ],
                    'pre-wedding' => [
                        'basic' => [
                            'title' => 'Basic Package',
                            'subtitle' => 'Ideal for Smart Budgeting',
                            'price' => 'Rp 800k',
                            'description' => [
                                'Photo Pre-Wedding Outdoor <strong>(1 sesi)</strong>',
                                '20 Foto Edit',
                                'Semua File (Kirim Langsung)',
                            ]
                        ],
                        'standard' => [
                            'title' => 'Standard Package',
                            'subtitle' => 'Perfect for Optimal Budgeting',
                            'price' => 'Rp 1.5jt',
                            'description' => [
                                '<strong>Make-Up Pre-Wedding</strong>',
                                'Photo Pre-Wedding Outdoor <strong>(Fullday)</strong>',
                                '<strong>Foto Latar Biru (Free Cetak 30pcs)</strong>',
                                '<strong>Cetak Foto + Bingkai (1pcs)</strong>',
                                '<strong>Unlimited Foto Edit</strong>',
                                'Semua File (Kirim Langsung)',
                            ]
                        ],
                        'premium' => [
                            'title' => 'Premium Package',
                            'subtitle' => 'For a Seamless Experience and Luxury Wedding',
                            'price' => 'Rp 5jt',
                            'description' => [
                                '<strong>MUA Pre-Wedding</strong>',
                                '<strong>Costum Pre-Wedding (1set)</strong>',
                                '<strong>Video Cinematic 3-5 menit</strong>',
                                'Photo Pre-Wedding Outdoor <strong>(Fullday)</strong>',
                                '<strong>Foto Latar Biru (Free Cetak 30pcs)</strong>',
                                'Cetak Foto + Bingkai <strong>(2pcs)</strong>',
                                '<strong>Unlimited Foto Edit</strong>',
                                'Semua File (Kirim Langsung)',
                            ]
                        ]
                    ]
                ]
            ];
        }

        if($type == 'undangan-digital'){
            $data = [
                'title' => 'Undangan Digital',
                'type' => [
                    'website_invitation' => [
                        'web_1' => [
                            'title' => 'Web Invitation I',
                            'subtitle' => 'Normal desain for WEB digital invitation Wedding | Photo or non Photo',
                            'price' => 'Rp 70k',
                            'tema' => [
                                'Floral',
                                'Elegant',
                                'Minimalis',
                            ]
                        ],
                        'web_2' => [
                            'title' => 'Web Invitation II',
                            'subtitle' => 'Luxury desain for WEB digital invitation Wedding | Photo or non Photo',
                            'price' => 'Rp 100k',
                            'tema' => [
                                'Islamic',
                                'Traditional/Adat',
                                'Overlay Shadow',
                                'Luxury',
                            ]
                        ],
                        'web_3' => [
                            'title' => 'Web Invitation III',
                            'subtitle' => 'Perfect desain for WEB digital invitation Wedding | Photo or non Photo',
                            'price' => 'Rp 130k',
                            'tema' => [
                                'Engagement/Pertunangan',
                                'Post Wedding',
                                'Wedding Anniversary',
                                'Birthday Party',
                                'Aqiqah',
                                'Khitanan',
                                'Meeting Invitation',
                                'Holiday',
                                'Graduation',
                                'Rehearsal Dinner',
                                'Bachelorette',
                                'Wedding Shower',
                                'Baby Shower',
                                'Baby Gender Reveal',
                            ]
                        ]
                    ],
                    'video_invitation' => [
                        'video_1' => [
                            'title' => 'Video Invitation I',
                            'subtitle' => 'Normal desain for Video digital invitation',
                            'price' => 'Rp 70k',
                            'tema' => [
                                'Floral',
                                'Elegant',
                                'Minimalis',
                                'Islamic',
                                'Traditional/Adat',
                                'Overlay Shadow',
                                'Luxury',
                            ]
                        ],
                        'video_2' => [
                            'title' => 'Video Invitation II',
                            'subtitle' => 'Awesome desain for Video digital invitation with animation 2D/3D | Hijab or Non Hijab',
                            'price' => 'Rp 150k',
                            'tema' => [
                                '<strong>Adat/Tradisional</strong> (Jawa Barat, DIY, Bali, Jawa Tengah, Sumatera Barat, Sumatera Selatan, Sulawesi Selatan, Bangka Belitung, Riau, Aceh)',
                                '<strong>Casual Animation</strong>',
                                '<strong>Profesi</strong> (Pilot, Polisi, TNI, TNI AL)',
                            ]
                        ]
                    ],
                    'invitation_design_(_undangan_cetak_)' => [
                        'design' => [
                            'title' => 'Design Invitation',
                            'subtitle' => 'Beautiful desain for your Printed invitation',
                            'price' => 'Rp 50k',
                            'tema' => [
                                'Floral',
                                'Elegant',
                                'Minimalis',
                                'Islamic',
                                'Traditional/Adat',
                                'Luxury',
                            ],
                            'description' => [
                                'Free Revisi 5x',
                                'Resolusi Full HD (PNG, JPG or PDF file)'
                            ]
                        ]
                    ]
                ]
            ];
        }

        $type_form = $type;

        return view('detail_pricelist', compact('data', 'type_form'));
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

    public function pemesanan($type)
    {
        
        abort_if(!$type, 404);

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

        if($type == 'wedding'){
            $description = '
                <p>Mohon untuk dibaca dan dipahami. jika ada yang kurang dipahami, silahkan hubungi admin.</p>

                <ul>
                    <li>Janji pertemuan secara langsung hanya dapat dilakukan setelah melakukan konfirmasi terlebih dahulu.</li>
                    <li>Pembayaran dapat dilakukan melalui COD atau transfer atas nama yang diberikan oleh admin aster visualism.</li>
                    <li>Penambahan lokasi, jam, dan wisudawan diluar perjanjian dikenakan biaya tambahan. info detail hubungi admin.</li>
                    <li>Jika terdapat biaya pada lokasi pemotretan, maka biaya tersebut ditanggung oleh client.</li>
                    <li>Booking = Pengisian form dan dengan pembayaran dp.</li>
                    <li>Fase pembayaran terbagi, yaitu Booking 20%, Event 70%, dan Finishing 10%. </li>
                    <li>Fase pembayaran Booking dilakukan minimal 20% atau 300rb.</li>
                    <li>Fase pembayaran Event dilakukan maksimal sebelum sesi pemotretan dimulai. (saat kedatangan fg dilokasi acara)</li>
                    <li>Fase pembayaran Finishing dilakukan saat penjemputan/pengantaran album foto.</li>
                    <li>Pembatalan sepihak dari client tanpa alasan yang jelas akan di viralkan melalui media sosial kami dan client tidak berhak untuk menuntut kembali dalam bentuk apapun kepada pihak yang berwajib.</li>
                    <li>Pembatalan sepihak dari client tanpa alasan yang jelas yang telah melakukan pembayaran tidak akan di viralkan namun dp hangus.</li>
                    <li>Pembatalan dari client dengan alasan yang jelas hanya dapat dilakukan h-3 dari jadwal yang disepakati. (kecuali kematian, kecelakaan atau musibah besar)</li>
                    <li>Pembatalan sepihak dari vendor dengan atau tanpa alasan yang jelas dp dikembalikan 2x lipat dan pihak yang dirugikan berhak mem-viralkan vendor. Vendor tidak berhak untuk menuntut kembali dalam bentuk apapun kepada pihak yang berwajib. (kecuali kematian, kecelakaan atau musibah besar)</li>
                    <li>Pemotretan Pre-Wedding hanya berlaku outdoor.</li>
                    <li>Info lainnya silahkan hubungi admin di nomor yang tertera.</li>
                    <li>Booking = membaca, memahami seluruh s&k yang berlaku.</li>
                </ul>

                <p>
                    Jangan lupa follow ig dan tiktok Aster Visualism di <strong>@aster.visualism</strong><br>
                    Contact us on : 0896 0806 9631 - Aster Visualism
                    <br><br>
                    Best regard<br>
                    ASTER VISUALISM 🌼 💞
                </p>
            ';
            return view('customer.formulir.form-wedding', compact('description'));
        }

        return view('customer.formulir.form-wisuda', compact('description'));
    }

    public function store_pemesanan(Request $request)
    {
        // $validate = $request->validate([
        //     'nama_lengkap' => 'required',
        //     'no_hp' => 'required',
        //     'instagram' => 'required',
        //     'gelar' => 'nullable',
        //     'univ' => 'required',
        //     'tgl_potret' => 'required',
        //     'jam_potret' => 'required',
        //     'lokasi' => 'required',
        //     'link_lokasi' => 'required',
        //     'jasa_jasa' => 'required|array',
        //     'paket' => 'required',
        //     'info_paket_pilihan' => 'required',
        //     'term_condition' => 'required',
        //     'pembayaran' => 'required',
        //     'bukti_tf' => 'required_if:pembayaran,1,2,3',
        // ]);

        $validate = $request->all();

        unset($validate['_token']);

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
                'nama' => $user->full_name,
                'email' => $user->email,
                'no_hp' => $request->no_hp ?? $request->whatsapp_pria ?? '0',
                'tipe_paket' => $request->paket,
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

    public function riwayat_pemesanan()
    {
        $user = auth()->user();
        abort_if(!$user, 404);
        $pemesanan = Pemesanan::where('user_id', $user->id)->latest()->get();

        return view('customer.riwayat-pesan', compact('pemesanan'));
    }

    public function pemesanan_view($id)
    {
        $pemesanan = Pemesanan::where([
            'user_id' => auth()->user()->id,
            'id' => $id
        ])->firstOrFail();

        return view('customer.pemesanan-view', compact('pemesanan'));
    }

    public function lihat_foto($id)
    {
        $pemesanan = Pemesanan::where([
            'user_id' => auth()->user()->id,
            'id' => $id
        ])->firstOrFail();

        return view('customer.lihat-foto', compact('pemesanan'));
    }

    public function galeri_saya()
    {
        $pemesanan = Pemesanan::where('user_id', auth()->user()->id)->pluck('id')->toArray();

        $galeri = Foto::whereIn('pesanan_id', $pemesanan)->latest()->get();
        
        return view('customer.galeri-saya', compact('pemesanan', 'galeri'));
    }

    public function download_foto($id)
    {
        $image = Foto::find($id);

        return response()->streamDownload(function() use ($image){
            echo file_get_contents($image->image);
        }, $image->title);
    }
}
