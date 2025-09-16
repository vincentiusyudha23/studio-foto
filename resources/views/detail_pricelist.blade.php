@extends('layouts.guest')

@section('style')
    <style>
        .type-package-item{
            padding: 10px;
            border: 2px solid white;
            border-radius: 10px;
            color: var(--bs-primary);
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            background: white;
            transition: transform 0.3s ease;
        }
        .type-package-item:hover{
            transform: scale(1.1);
            background: var(--bs-primary) !important;
            color: white;
        }
        .type-package-item.active{
            background: var(--bs-primary) !important;
        }    
    </style>    
@endsection

@section('content')
    <div class="w-100 pt-2 text-center">
        <h4 class="badge text-primary bg-white fs-6">Pricelist</h4>
        <h2 class="text-center">Graduation Photo & Video</h2>

        <ul class="w-100 d-flex justify-content-center align-items-center gap-3 flex-wrap mt-4 nav nav-pills" role="tablist" style="list-style: none;">
            <li class="nav-item">
                <button type="button" class="type-package-item fw-bold shadow-sm nav-link active" data-bs-toggle="pill" data-bs-target="#tab-single">SINGLE</button>
            </li>
            <li class="nav-item">
                <button type="button" class="type-package-item fw-bold shadow-sm nav-link" data-bs-toggle="pill" data-bs-target="#tab-couple">COUPLE</button>
            </li>
            <li class="nav-item">
                <button type="button" class="type-package-item fw-bold shadow-sm nav-link" data-bs-toggle="pill" data-bs-target="#tab-group">GROUP</button>
            </li>
            <li class="nav-item">
                <button type="button" class="type-package-item fw-bold shadow-sm nav-link" data-bs-toggle="pill" data-bs-target="#tab-video">VIDEOGRAPHY</button>
            </li>
            <li class="nav-item">
                <button type="button" class="type-package-item fw-bold shadow-sm nav-link" data-bs-toggle="pill" data-bs-target="#tab-bundling">BUNDLING</button>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" role="tabpanel" id="tab-single">
                <div class="d-flex flex-wrap justify-content-center align-items-stretch gap-3 py-3">
                    <div class="card" style="width: 400px;">
                        <div class="card-body text-start">
                            <h3 class="card-title m-0 p-0">Basic Package</h3>
                            <p>Ideal for Smart Budgeting</p>
    
                            <div class="d-flex justify-content-between align-items-center">
                                @if (auth()->check())
                                    <a href="{{ route('customer.pemesanan') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @else
                                    <a href="{{ route('customer.login') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @endif
                                <div>
                                    <span class="">Price</span>
                                    <h3 class="fw-bold">Rp 350k</h3>
                                </div>
                            </div>
    
                            <hr>
    
                            <h4 class="fw-bold fst-italic">Included</h4>
                            <ul>
                                <li>Foto Outdoor (1 wisudawan/ti)</li>
                                <li>Foto Pose, Keluarga, & Teman</li>
                                <li>Durasi 50 menit + 10 menit</li>
                                <li>20 Foto Edit</li>
                                <li>Semua File Foto (Kirim Langsung)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card" style="width: 400px;">
                        <div class="card-body text-start">
                            <h3 class="card-title m-0 p-0">Standard Package</h3>
                            <p>Perfect for Optimal Budgeting</p>
    
                            <div class="d-flex justify-content-between align-items-center">
                                @if (auth()->check())
                                    <a href="{{ route('customer.pemesanan') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @else
                                    <a href="{{ route('customer.login') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @endif
                                <div>
                                    <span class="">Price</span>
                                    <h3 class="fw-bold">Rp 450k</h3>
                                </div>
                            </div>
    
                            <hr>
    
                            <h4 class="fw-bold fst-italic">Included</h4>
                            <ul>
                                <li>Foto Outdoor (1 wisudawan/ti)</li>
                                <li>Foto Pose, Keluarga, & Teman</li>
                                <li>Durasi <strong>80 menit</strong> + 10 menit</li>
                                <li><strong>Unlimited</strong> Foto Edit</li>
                                <li>Semua File Foto (Kirim Langsung)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card" style="width: 400px;">
                        <div class="card-body text-start">
                            <h3 class="card-title m-0 p-0">Premium Package</h3>
                            <p>For a Seamless Experience and Luxury Wedding</p>
    
                            <div class="d-flex justify-content-between align-items-center">
                                @if (auth()->check())
                                    <a href="{{ route('customer.pemesanan') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @else
                                    <a href="{{ route('customer.login') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @endif
                                <div>
                                    <span class="">Price</span>
                                    <h3 class="fw-bold">Rp 800k</h3>
                                </div>
                            </div>
    
                            <hr>
    
                            <h4 class="fw-bold fst-italic">Included</h4>
                            <ul>
                                <li>Foto Outdoor (1 wisudawan/ti)</li>
                                <li>Foto Pose, Keluarga, & Teman</li>
                                <li>Durasi <strong>80 menit</strong> + 10 menit</li>
                                <li class="fw-bold">Cetak Foto 16r + Bingkai (1pcs)</li>
                                <li class="fw-bold">Cetak Foto 12r + Bingkai (1pcs)</li>
                                <li class="fw-bold">Cetak Foto 4r (5pcs)</li>
                                <li><strong>Unlimited</strong> Foto Edit</li>
                                <li>Semua File Foto (Kirim Langsung)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" role="tabpanel" id="tab-couple">
                <div class="d-flex flex-wrap justify-content-center align-items-stretch gap-3 py-3">
                    <div class="card" style="width: 400px;">
                        <div class="card-body text-start">
                            <h3 class="card-title m-0 p-0">Basic Package</h3>
                            <p>Ideal for Smart Budgeting</p>
        
                            <div class="d-flex justify-content-between align-items-center">
                                @if (auth()->check())
                                    <a href="{{ route('customer.pemesanan') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @else
                                    <a href="{{ route('customer.login') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @endif
                                <div>
                                    <span class="">Price</span>
                                    <h3 class="fw-bold">Rp 400k</h3>
                                </div>
                            </div>
        
                            <hr>
        
                            <h4 class="fw-bold fst-italic">Included</h4>
                            <ul>
                                <li>Foto Outdoor (2 wisudawan/ti)</li>
                                <li>Foto Pose, Keluarga, & Teman</li>
                                <li>Durasi 50 menit + 10 menit</li>
                                <li>30 Foto Edit</li>
                                <li>Semua File Foto (Kirim Langsung)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card" style="width: 400px;">
                        <div class="card-body text-start">
                            <h3 class="card-title m-0 p-0">Standard Package</h3>
                            <p>Perfect for Optimal Budgeting</p>
        
                            <div class="d-flex justify-content-between align-items-center">
                                @if (auth()->check())
                                    <a href="{{ route('customer.pemesanan') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @else
                                    <a href="{{ route('customer.login') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @endif
                                <div>
                                    <span class="">Price</span>
                                    <h3 class="fw-bold">Rp 550k</h3>
                                </div>
                            </div>
        
                            <hr>
        
                            <h4 class="fw-bold fst-italic">Included</h4>
                            <ul>
                                <li>Foto Outdoor (2 wisudawan/ti)</li>
                                <li>Foto Pose, Keluarga, & Teman</li>
                                <li>Durasi <strong>80 menit</strong> + 10 menit</li>
                                <li><strong>Unlimited</strong> Foto Edit</li>
                                <li>Semua File Foto (Kirim Langsung)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card" style="width: 400px;">
                        <div class="card-body text-start">
                            <h3 class="card-title m-0 p-0">Premium Package</h3>
                            <p>For a Seamless Experience and Luxury Wedding</p>
        
                            <div class="d-flex justify-content-between align-items-center">
                                @if (auth()->check())
                                    <a href="{{ route('customer.pemesanan') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @else
                                    <a href="{{ route('customer.login') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @endif
                                <div>
                                    <span class="">Price</span>
                                    <h3 class="fw-bold">Rp 1250k</h3>
                                </div>
                            </div>
        
                            <hr>
        
                            <h4 class="fw-bold fst-italic">Included</h4>
                            <ul>
                                <li>Foto Outdoor (2 wisudawan/ti)</li>
                                <li>Foto Pose, Keluarga, & Teman</li>
                                <li>Durasi <strong>80 menit</strong> + 10 menit</li>
                                <li class="fw-bold">Cetak Foto 16r + Bingkai (1pcs)</li>
                                <li class="fw-bold">Cetak Foto 12r + Bingkai (1pcs)</li>
                                <li class="fw-bold">Cetak Foto 4r (5pcs)</li>
                                <li><strong>Unlimited</strong> Foto Edit</li>
                                <li>Semua File Foto (Kirim Langsung)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" role="tabpanel" id="tab-group">
                <div class="d-flex flex-wrap justify-content-center align-items-stretch gap-3 py-3">
                    <div class="card" style="width: 400px;">
                        <div class="card-body text-start">
                            <h3 class="card-title m-0 p-0">Exclusive Package</h3>
                            <p>Ideal for Smart Budgeting</p>
        
                            <div class="d-flex justify-content-between align-items-center">
                                @if (auth()->check())
                                    <a href="{{ route('customer.pemesanan') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @else
                                    <a href="{{ route('customer.login') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @endif
                                <div>
                                    <span class="">Price</span>
                                    <h3 class="fw-bold">Rp 150k / orang</h3>
                                </div>
                            </div>
        
                            <hr>
        
                            <h4 class="fw-bold fst-italic">Included</h4>
                            <ul>
                                <li>Foto Outdoor (Pose & Group)</li>
                                <li>3-5 wisudawan/ti</li>
                                <li>Durasi 50 menit + 10 menit</li>
                                <li>30 Foto Edit</li>
                                <li>Semua File Foto (Kirim Langsung)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card" style="width: 400px;">
                        <div class="card-body text-start">
                            <h3 class="card-title m-0 p-0">Dynamic Package</h3>
                            <p>Perfect for Optimal Budgeting</p>
        
                            <div class="d-flex justify-content-between align-items-center">
                                @if (auth()->check())
                                    <a href="{{ route('customer.pemesanan') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @else
                                    <a href="{{ route('customer.login') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @endif
                                <div>
                                    <span class="">Price</span>
                                    <h3 class="fw-bold">Rp 120k / orang</h3>
                                </div>
                            </div>
        
                            <hr>
        
                            <h4 class="fw-bold fst-italic">Included</h4>
                            <ul>
                                <li>Foto Outdoor (Pose & Group)</li>
                                <li>Min. 6-8 wisudawan/ti</li>
                                <li>Durasi <strong>80 menit</strong> + 10 menit</li>
                                <li><strong>Unlimited</strong> Foto Edit</li>
                                <li>Semua File Foto (Kirim Langsung)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card" style="width: 400px;">
                        <div class="card-body text-start">
                            <h3 class="card-title m-0 p-0">Energetic Package</h3>
                            <p>For a Seamless Experience and Luxury Wedding</p>
        
                            <div class="d-flex justify-content-between align-items-center">
                                @if (auth()->check())
                                    <a href="{{ route('customer.pemesanan') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @else
                                    <a href="{{ route('customer.login') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @endif
                                <div>
                                    <span class="">Price</span>
                                    <h3 class="fw-bold">Rp 100k / orang</h3>
                                </div>
                            </div>
        
                            <hr>
        
                            <h4 class="fw-bold fst-italic">Included</h4>
                            <ul>
                                <li>Foto Outdoor (Pose & Group)</li>
                                <li>Min. 9-12 wisudawan/ti</li>
                                <li>Durasi <strong>80 menit</strong> + 10 menit</li>
                                <li><strong>Unlimited</strong> Foto Edit</li>
                                <li>Semua File Foto (Kirim Langsung)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" role="tabpanel" id="tab-video">
                <div class="d-flex flex-wrap justify-content-center align-items-stretch gap-3 py-3">
                    <div class="card" style="width: 400px;">
                        <div class="card-body text-start">
                            <h3 class="card-title m-0 p-0">Single Grads</h3>
                            <p>Ideal for Smart Budgeting</p>
        
                            <div class="d-flex justify-content-between align-items-center">
                                @if (auth()->check())
                                    <a href="{{ route('customer.pemesanan') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @else
                                    <a href="{{ route('customer.login') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @endif
                                <div>
                                    <span class="">Price</span>
                                    <h3 class="fw-bold">Rp 500k</h3>
                                </div>
                            </div>
        
                            <hr>
        
                            <h4 class="fw-bold fst-italic">Included</h4>
                            <ul>
                                <li>Video Cinematic 1-3 menit</li>
                                <li>Pose sendiri & teman (diarahkan)</li>
                                <li>Take Video 50 menit</li>
                                <li>Take Foto 10 Menit</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card" style="width: 400px;">
                        <div class="card-body text-start">
                            <h3 class="card-title m-0 p-0">Couple Grads</h3>
                            <p>Perfect for Optimal Budgeting</p>
        
                            <div class="d-flex justify-content-between align-items-center">
                                @if (auth()->check())
                                    <a href="{{ route('customer.pemesanan') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @else
                                    <a href="{{ route('customer.login') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @endif
                                <div>
                                    <span class="">Price</span>
                                    <h3 class="fw-bold">Rp 500k</h3>
                                </div>
                            </div>
        
                            <hr>
        
                            <h4 class="fw-bold fst-italic">Included</h4>
                            <ul>
                                <li>Video Cinematic 1-3 menit</li>
                                <li>Pose sendiri & teman (diarahkan)</li>
                                <li>Take Video 50 menit</li>
                                <li>Take Foto 10 Menit</li>
                                <li><strong>2 wisudawan/ti</strong></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card" style="width: 400px;">
                        <div class="card-body text-start">
                            <h3 class="card-title m-0 p-0">Groups Grads</h3>
                            <p>For a Seamless Experience and Luxury Wedding</p>
        
                            <div class="d-flex justify-content-between align-items-center">
                                @if (auth()->check())
                                    <a href="{{ route('customer.pemesanan') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @else
                                    <a href="{{ route('customer.login') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @endif
                                <div>
                                    <span class="">Price</span>
                                    <h3 class="fw-bold">Rp 150k / orang</h3>
                                </div>
                            </div>
        
                            <hr>
        
                            <h4 class="fw-bold fst-italic">Included</h4>
                            <ul>
                                <li>Video Cinematic 1-3 menit</li>
                                <li>Pose sendiri & teman (diarahkan)</li>
                                <li>Take Video 50 menit</li>
                                <li><strong>5-10 wisudawan/ti</strong></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" role="tabpanel" id="tab-bundling">
                <div class="d-flex flex-wrap justify-content-center align-items-stretch gap-3 py-3">
                    <div class="card" style="width: 400px;">
                        <div class="card-body text-start">
                            <h3 class="card-title m-0 p-0">Bundling I</h3>
                            <p>Foto + Video Wisuda</p>
        
                            <div class="d-flex justify-content-between align-items-center">
                                @if (auth()->check())
                                    <a href="{{ route('customer.pemesanan') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @else
                                    <a href="{{ route('customer.login') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @endif
                                <div>
                                    <span class="">Price</span>
                                    <h3 class="fw-bold">Rp 500k</h3>
                                </div>
                            </div>
        
                            <hr>
        
                            <h4 class="fw-bold fst-italic">Included</h4>
                            <ul>
                                <li>Video Cinematic 1-3 menit</li>
                                <li>Foto wisuda (60 minutes)</li>
                                <li>Unlmited Photo & Edit</li>
                                <li>Foto single pose, family & friends</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card" style="width: 400px;">
                        <div class="card-body text-start">
                            <h3 class="card-title m-0 p-0">Bundling II</h3>
                            <p>Foto + Make-Up Wisuda</p>
        
                            <div class="d-flex justify-content-between align-items-center">
                                @if (auth()->check())
                                    <a href="{{ route('customer.pemesanan') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @else
                                    <a href="{{ route('customer.login') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @endif
                                <div>
                                    <span class="">Price</span>
                                    <h3 class="fw-bold">Rp 700k</h3>
                                </div>
                            </div>
        
                            <hr>
        
                            <h4 class="fw-bold fst-italic">Included</h4>
                            <ul>
                                <li>Make-Up Wisuda (include softlens & Nail Extension)</li>
                                <li>Graduation outdoor (60 minutes)</li>
                                <li>Unlmited Photo & Edit</li>
                                <li>Semua file foto (kirim sameday)</li>
                                <li>Foto single pose, family & friends</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card" style="width: 400px;">
                        <div class="card-body text-start">
                            <h3 class="card-title m-0 p-0">Bundling III</h3>
                            <p>Foto + Video + Make-Up Wisuda</p>
        
                            <div class="d-flex justify-content-between align-items-center">
                                @if (auth()->check())
                                    <a href="{{ route('customer.pemesanan') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @else
                                    <a href="{{ route('customer.login') }}" class="btn btn-primary fw-semibold">Pesan</a>
                                @endif
                                <div>
                                    <span class="">Price</span>
                                    <h3 class="fw-bold">Rp 1100k</h3>
                                </div>
                            </div>
        
                            <hr>
        
                            <h4 class="fw-bold fst-italic">Included</h4>
                            <ul>
                                <li>Make-Up Wisuda (include softlens & Nail Extension)</li>
                                <li>Video Cinematic 1-3 menit</li>
                                <li>Foto Wisuda (60 minutes)</li>
                                <li>Unlmited Photo & Edit</li>
                                <li>Semua file foto (kirim sameday)</li>
                                <li>Foto single pose, family & friends</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5 px-md-5">
            <h2>Terms & Condition</h2>
            <p>MOHON UNTUK DIBACA DAN DIPAHAMI. JIKA ADA YANG KURANG DIPAHAMI, SILAHKAN HUBUNGI ADMIN.</p>
            <ul class="text-start px-md-3">
                <li>JANJI PERTEMUAN SECARA LANGSUNG HANYA DAPAT DILAKUKAN SETELAH MELAKUKAN KONFIRMASI TERLEBIH DAHULU.</li>
                <li>PEMBAYARAN DAPAT DILAKUKAN MELALUI COD ATAU TRANSFER ATAS NAMA YANG DIBERIKAN OLEH ADMIN ASTER VISUALISM.</li>
                <li>PENAMBAHAN LOKASI, JAM, DAN WISUDAWAN DILUAR PERJANJIAN DIKENAKAN BIAYA TAMBAHAN. INFO DETAIL HUBUNGI ADMIN.</li>
                <li>JIKA TERDAPAT BIAYA PADA LOKASI PEMOTRETAN, MAKA BIAYA TERSEBUT DITANGGUNG OLEH CLIENT.</li>
                <li>BOOKING = PENGISIAN FORM DAN PEMBAYARAN DP.</li>
                <li>PEMBAYARAN HANYA DILAKUKAN 1X YAITU SEBELUM/SETELAH PEMOTRETAN SELESAI DILAKUKAN. (UNTUK JASA FOTO & VIDEO)</li>
                <li>PEMBAYARAN HANYA DILAKUKAN 1X YAITU SETELAH MAKE-UP SELESAI DILAKUKAN. (UNTUK JASA MAKE-UP)</li>
                <li>PEMBATALAN SEPIHAK DARI CLIENT TANPA ALASAN YANG JELAS AKAN DI VIRALKAN MELALUI MEDIA SOSIAL KAMI DAN CLIENT TIDAK BERHAK UNTUK MENUNTUT KEMBALI DALAM BENTUK APAPUN KEPADA PIHAK YANG BERWAJIB.</li>
                <li>PEMBATALAN SEPIHAK DARI CLIENT TANPA ALASAN YANG JELAS YANG TELAH MELAKUKAN PEMBAYARAN TIDAK AKAN DI VIRALKAN NAMUN DP HANGUS.</li>
                <li>PEMBATALAN DARI CLIENT DENGAN ALASAN YANG JELAS HANYA DAPAT DILAKUKAN PALING LAMBAT H-3 DARI JADWAL YANG DISEPAKATI (KECUALI KEMATIAN, KECELAKAAN ATAU MUSIBAH BESAR). JIKA MELAMPAUI BATAS WAKTU TERSEBUT, MAKA CLIENT TETAP WAJIB MEMBAYAR PENUH SESUAI PAKET YANG DIPILIH DAN DISEPAKATI.</li>
                <li>PEMBATALAN SEPIHAK DARI VENDOR DENGAN ATAU TANPA ALASAN YANG JELAS DP DIKEMBALIKAN 2X LIPAT DAN PIHAK YANG DIRUGIKAN BERHAK MEM-VIRALKAN VENDOR. VENDOR TIDAK BERHAK UNTUK MENUNTUT KEMBALI DALAM BENTUK APAPUN KEPADA PIHAK YANG BERWAJIB. (KECUALI KEMATIAN, KECELAKAAN ATAU MUSIBAH BESAR)</li>
                <li>PEMOTRETAN HANYA BERLAKU OUTDOOR.</li>
                <li>WAJIB ON-TIME AGAR TIDAK TERDAPAT PENAMBAHAN BIAYA KARENA PENAMBAHAN DURASI PEMOTRETAN.</li>
                <li>PENAMBAHAN WAKTU DILUAR KESEPAKATAN AKAN DIKENAKAN BIAYA TAMBAHAN SEBESAR 100RB/JAM (BERLAKU KELIPATAN).</li>
                <li>INFO LAINNYA SILAHKAN HUBUNGI ADMIN DI NOMOR YANG TERTERA.</li>
                <li>BOOKING = MEMAHAMI SELURUH S&K YANG BERLAKU.</li>
            </ul>
        </div>

        <div class="mt-2 py-3">
            <h2>Additional</h2>
            <ul class="text-start d-flex justify-content-center flex-column align-items-center">
                <li>PENAMBAHAN WAKTU = 100RB/60 MENIT</li>
                <li>MAKE-UP KELUARGA WANITA = 150RB/ORANG</li>
            </ul>
        </div>
    </div>
@endsection