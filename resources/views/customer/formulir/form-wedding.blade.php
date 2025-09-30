@extends('layouts.guest')

@section('content')
    <div class="w-100 d-flex justify-content-center align-items-center flex-column py-2" x-data="pemesanan">
        <div class="card" style="width: 650px;">
            <div class="card-header">
                <div class="card-title mb-2 pt-2">
                    <h4 class="text-primary fw-bold d-flex align-items-center">
                        <i class="lab la-wpforms me-2"></i>
                        Formulir Order Foto & Video Pre-Wedd/Wedding
                    </h4>
                </div>
            </div>
            <div class="card-body">

                <div class="carousel slide" id="carousel-form-pemesanan">
                    <div class="carousel-inner mb-2">
                        <div class="carousel-item active">
                            <div>
                                {!! $description !!}
                            </div>
                        </div>
                        <div class="carousel-item" data-form="form_customer">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label required fw-semibold" for="nama_lengkap_pria">
                                            Nama Lengkap <small class="text-muted fst-italic">(Mempelai Pria)</small>
                                        </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" x-model="dataForm.nama_lengkap_pria" name="nama_lengkap_pria" id="nama_lengkap_pria" required>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label required fw-semibold" for="instagram_pria">
                                            Instagram <small class="text-muted fst-italic">(Mempelai Pria)</small>
                                        </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" x-model="dataForm.instagram_pria" name="instagram_pria" id="instagram_pria" required>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label required fw-semibold" for="whatsapp_pria">
                                            WhatsApp <small class="text-muted fst-italic">(Mempelai Pria)</small>
                                        </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" x-model="dataForm.whatsapp_pria" name="whatsapp_pria" id="whatsapp_pria" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mb-2">
                                        <label class="form-label required fw-semibold" for="nama_lengkap_wanita">
                                            Nama Lengkap <small class="text-muted fst-italic">(Mempelai Wanita)</small>
                                        </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" x-model="dataForm.nama_lengkap_wanita" name="nama_lengkap_wanita" id="nama_lengkap_wanita" required>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label required fw-semibold" for="instagram_wanita">
                                            Instagram <small class="text-muted fst-italic">(Mempelai Wanita)</small>
                                        </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" x-model="dataForm.instagram_wanita" name="instagram_wanita" id="instagram_wanita" required>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label required fw-semibold" for="whatsapp_wanita">
                                            WhatsApp <small class="text-muted fst-italic">(Mempelai Wanita)</small>
                                        </label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" x-model="dataForm.whatsapp_wanita" name="whatsapp_wanita" id="whatsapp_wanita" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item" data-form="form_jasa_jasa">

                            <div class="mb-2">
                                <label class="form-label fw-semibold required" for="info_paket_pilihan">Nama Paket yang diambil serta Nominal Harga yang disepakati. <small class="text-muted">(Jika tidak paham, silahkan hubungi admin)</small></label>
                                <div class="px-2">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Isi disini..." name="info_paket_pilihan" id="info_paket_pilihan" x-model="dataForm.info_paket_pilihan">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label class="form-label required fw-semibold">Jasa-jasa yang di pesan</label>
                                <div class="px-2">
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" x-model="dataForm.jasa_jasa" type="checkbox" id="fotografi" value="fotografi" required>
                                        <label class="form-check-label" for="fotografi">Fotografi</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" x-model="dataForm.jasa_jasa" type="checkbox" id="videografi" value="videografi" required>
                                        <label class="form-check-label" for="videografi">Videografi</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" x-model="dataForm.jasa_jasa" type="checkbox" id="makeup" value="makeup" required>
                                        <label class="form-check-label" for="makeup">Make-Up</label>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" x-model="dataForm.jasa_jasa" type="checkbox" id="lainnya" value="lainnya" required>
                                            <label class="form-check-label" for="lainnya">Lainnya...</label>
                                        </div>
                                        <input type="text" class="form-control" x-transition x-show="dataForm.jasa_jasa.includes('lainnya')" placeholder="Lainnya..." x-model="jasaLainnya">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label class="form-label required fw-semibold">Pemesanan Acara</label>
                                <div class="px-2">
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" x-model="dataForm.pemesanan_acara" type="checkbox" id="lamaran" value="lamaran" required>
                                        <label class="form-check-label" for="lamaran">Lamaran</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" x-model="dataForm.pemesanan_acara" type="checkbox" id="akad" value="akad" required>
                                        <label class="form-check-label" for="akad">Akad</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" x-model="dataForm.pemesanan_acara" type="checkbox" id="resepsi" value="resepsi" required>
                                        <label class="form-check-label" for="resepsi">Resepsi</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" x-model="dataForm.pemesanan_acara" type="checkbox" id="prewedding" value="prewedding" required>
                                        <label class="form-check-label" for="prewedding">Pre-Wedding</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" x-model="dataForm.pemesanan_acara" type="checkbox" id="aqiqah" value="aqiqah" required>
                                        <label class="form-check-label" for="aqiqah">Aqiqah</label>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" x-model="dataForm.pemesanan_acara" type="checkbox" id="pemesanan_acara_lainnya" value="pemesanan_acara_lainnya" required>
                                            <label class="form-check-label" for="pemesanan_acara_lainnya">Lainnya...</label>
                                        </div>
                                        <input type="text" class="form-control" x-transition x-show="dataForm.pemesanan_acara.includes('pemesanan_acara_lainnya')" placeholder="Lainnya..." x-model="pemesanan_acara_lainnya">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <template x-if="['lamaran', 'aqiqah', 'pemesanan_acara_lainnya'].some( v => dataForm.pemesanan_acara.includes(v))">
                            <div class="carousel-item" data-form="form_lamaran_aqiqah">
                                <div class="mb-2">
                                    <label class="form-label required fw-semibold" for="tanggal_jam_lamaran_aqiqah">Tanggal dan Jam Acara <small class="text-muted">(Lamaran, Aqiqah dan Event)</small></label>
                                    <div class="form-group">
                                        <input type="datetime-local" class="form-control" x-model="dataForm.tanggal_jam_lamaran_aqiqah" name="tanggal_jam_lamaran_aqiqah" id="tanggal_jam_lamaran_aqiqah" required>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label required fw-semibold" for="alamat_lamaran_aqiqah">Alamat <small class="text-muted">(Lamaran, Aqiqah dan Event)</small></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" x-model="dataForm.alamat_lamaran_aqiqah" name="alamat_lamaran_aqiqah" id="alamat_lamaran_aqiqah" required>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label required fw-semibold" for="link_google_map_lamaran_aqiqah">Link Google Maps <small class="text-muted">(Lamaran, Aqiqah dan Event)</small></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" x-model="dataForm.link_google_map_lamaran_aqiqah" name="link_google_map_lamaran_aqiqah" id="link_google_map_lamaran_aqiqah" required>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template x-if="dataForm.pemesanan_acara.includes('akad')">
                            <div class="carousel-item" data-form="form_akad">
                                <div class="mb-2">
                                    <label class="form-label required fw-semibold" for="tanggal_jam_akad">Tanggal Acara <small class="text-muted">(Akad Pernikahan)</small></label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" x-model="dataForm.tanggal_jam_akad" name="tanggal_jam_akad" id="tanggal_jam_akad" required>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label required fw-semibold" for="alamat_akad">Alamat <small class="text-muted">(Akad Pernikahan)</small></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" x-model="dataForm.alamat_akad" name="alamat_akad" id="alamat_akad" required>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label required fw-semibold" for="link_google_map_akad">Link Google Maps <small class="text-muted">(Akad Pernikahan)</small></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" x-model="dataForm.link_google_map_akad" name="link_google_map_akad" id="link_google_map_akad" required>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template x-if="dataForm.pemesanan_acara.includes('prewedding')">
                            <div class="carousel-item" data-form="form_prewedding">
                                <div class="mb-2">
                                    <label class="form-label required fw-semibold" for="tanggal_jam_prewedding">Tanggal Acara <small class="text-muted">(Pre-Wedding)</small></label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" x-model="dataForm.tanggal_jam_prewedding" name="tanggal_jam_prewedding" id="tanggal_jam_prewedding" required>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label required fw-semibold" for="alamat_prewedding">Alamat <small class="text-muted">(Pre-Wedding)</small></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" x-model="dataForm.alamat_prewedding" name="alamat_prewedding" id="alamat_prewedding" required>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label required fw-semibold" for="link_google_map_prewedding">Link Google Maps <small class="text-muted">(Pre-Wedding)</small></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" x-model="dataForm.link_google_map_prewedding" name="link_google_map_prewedding" id="link_google_map_prewedding" required>
                                    </div>
                                </div>
                            </div>
                        </template>
                        
                        <template x-if="dataForm.pemesanan_acara.includes('resepsi')">
                            <div class="carousel-item" data-form="form_resepsi">
                                <div class="mb-2">
                                    <label class="form-label required fw-semibold" for="tanggal_jam_resepsi">Tanggal Acara <small class="text-muted">(Resepsi)</small></label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" x-model="dataForm.tanggal_jam_resepsi" name="tanggal_jam_resepsi" id="tanggal_jam_resepsi" required>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label required fw-semibold" for="alamat_resepsi">Alamat <small class="text-muted">(Resepsi)</small></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" x-model="dataForm.alamat_resepsi" name="alamat_resepsi" id="alamat_resepsi" required>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label required fw-semibold" for="link_google_map_resepsi">Link Google Maps <small class="text-muted">(Resepsi)</small></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" x-model="dataForm.link_google_map_resepsi" name="link_google_map_resepsi" id="link_google_map_resepsi" required>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <div class="carousel-item" data-form="form_waktu_acara">
                            <div class="mb-2" >
                                <label class="form-label required fw-semibold" for="waktu_acara">Waktu/Jam Acara yang disepakati</label>
                                <div class="form-group">
                                    <input type="time" class="form-control" x-model="dataForm.waktu_acara" name="waktu_acara" id="waktu_acara" required>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item" data-form="term_condition">
                            <div class="mb-2" >
                                <label class="form-label fw-semibold">Bersedia membaca, memahami, dan menyetujui syarat dan ketentuan di bagian paling atas.</label>
                                <div class="px-2">
                                    <div class="form-check form-switch mb-1">
                                        <input class="form-check-input" type="checkbox" role="switch" id="term_condition" x-model="dataForm.term_condition" name="term_condition" value="term_condition">
                                        <label class="form-check-label" for="term_condition">Iya, saya membaca, memahami, dan menyetujui syarat dan ketentuan di bagian paling atas.</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item" data-form="form_pembayaran">
                            <div class="mb-2">
                                <label class="form-label required" for="pembayaran">Pembayaran Melalui</label>
                                <select class="form-select" x-model="dataForm.pembayaran" id="pembayaran">
                                    <option selected>Pilih Metode Pembayaran...</option>
                                    <option value="1">Seabank : 901273297604 an. Tegar Wahyu Pamungkas</option>
                                    <option value="2">BRI : 023101044396507 an. Tegar Wahyu Pamungkas</option>
                                    <option value="3">DANA : 082178259142 an. Tegar Wahyu Pamungkas</option>
                                    <option value="4">Cash</option>
                                </select>
                            </div>

                            <div class="mb-2" x-show="dataForm.pembayaran && dataForm.pembayaran != 4" x-transition>
                                <label class="form-label" for="bukti_tf">Bukti Transfer</label>
                                <div class="form-group">
                                    <input class="form-control" @change="handleBuktiTransfer" type="file" accept="image/*,application/pdf" name="bukti_tf" id="bukti_tf">
                                </div>
                            </div>
                        </div>
                    </div>

                    <template x-if="activedForm == 'form_pembayaran'">
                        <button x-on:click="submit" :disabled="isLoading || validationPembayaran" class="w-100 btn btn-primary mb-2 fw-semibold" type="button">
                            <i class="las la-spinner la-spin" x-show="isLoading"></i>
                            Konfirmasi
                        </button>
                    </template>

                    <div class="row">
                        <div class="col-12 mb-2 col-md-6" :class="{ 'col-md-6' : activedForm != 'form_pembayaran' }">
                            <button class="btn btn-primary w-100 fw-semibold" x-on:click="stepForm--" :disabled="stepForm <= 1 || isLoading" type="button" data-bs-target="#carousel-form-pemesanan" data-bs-slide="prev">Kembali</button>
                        </div>
                        <template x-if="activedForm != 'form_pembayaran'">
                            <div class="col-md-6 col-12 mb-2">
                                <button class="btn btn-primary w-100 fw-semibold" x-on:click="stepForm++" 
                                    :disabled="stepOneValid || 
                                            stepTwoValid || 
                                            validationFormLamaranAqiqah || 
                                            validationFormAkad || 
                                            validationFormPrewedding || 
                                            validationFormResepsi || 
                                            validationWaktuAcara || 
                                            validationTermCondition" 
                                    type="button" data-bs-target="#carousel-form-pemesanan" data-bs-slide="next">Selanjutnya</button>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.0/dist/cdn.min.js"></script> --}}
    <script>
        const pesanForm = {
            nama_lengkap_pria: null,
            nama_lengkap_wanita: null,
            whatsapp_pria: null,
            whatsapp_wanita: null,
            instagram_pria: null,
            instagram_wanita: null,
            lokasi: null,
            link_lokasi: null,
            jasa_jasa: [],
            pemesanan_acara: [],
            term_condition: false,
            pembayaran: null,
            tanggal_jam_lamaran_aqiqah: null,
            alamat_lamaran_aqiqah: null,
            link_google_map_lamaran_aqiqah: null,
            tanggal_jam_akad: null,
            alamat_akad: null,
            link_google_map_akad: null,
            tanggal_jam_prewedding: null,
            alamat_prewedding: null,
            link_google_map_prewedding: null,
            tanggal_jam_resepsi: null,
            alamat_resepsi: null,
            link_google_map_resepsi: null,
            waktu_acara: null,
            info_paket_pilihan: null
        };
        document.addEventListener('alpine:init', () => {
            Alpine.data('pemesanan', () => ({
                stepForm: 1,
                dataForm: pesanForm,
                jasaLainnya: null,
                pemesanan_acara_lainnya: null,
                isLoading: false,
                bukti_tf: null,
                activedForm: null,
                get validationPembayaran(){
                    if(this.activedForm != 'form_pembayaran') return false;

                    if(this.dataForm.pembayaran != 4 && !this.bukti_tf) return true;

                    return false;
                },
                get stepOneValid(){
                    if(this.activedForm != 'form_customer') return false;

                    if(!this.dataForm.nama_lengkap_pria || 
                        !this.dataForm.whatsapp_pria || 
                        !this.dataForm.instagram_pria || 
                        !this.dataForm.nama_lengkap_wanita || 
                        !this.dataForm.whatsapp_wanita || 
                        !this.dataForm.instagram_wanita){
                            return true;
                        }

                    return false;
                },
                get stepTwoValid(){
                    if(this.activedForm != 'form_jasa_jasa') return false;

                    if(!this.dataForm.info_paket_pilihan || this.dataForm.jasa_jasa.length <= 0 || this.dataForm.pemesanan_acara.length <= 0){
                        return true;
                    }

                    return false;
                },
                get validationTermCondition(){
                    if(this.activedForm != 'term_condition') return false;

                    if(!this.dataForm.term_condition) return true;

                    return false;
                },
                get validationWaktuAcara(){
                    if(this.activedForm != 'form_waktu_acara') return false;

                    if(!this.dataForm.waktu_acara) return true;

                    return false;
                },
                get validationFormLamaranAqiqah(){
                    if(this.activedForm != 'form_lamaran_aqiqah') return false;

                    if(!this.dataForm.tanggal_jam_lamaran_aqiqah || !this.dataForm.alamat_lamaran_aqiqah || !this.dataForm.link_google_map_lamaran_aqiqah){
                        return true;
                    }

                    return false;
                },
                get validationFormAkad(){
                    if(this.activedForm != 'form_akad') return false;

                    if(!this.dataForm.tanggal_jam_akad || !this.dataForm.alamat_akad || !this.dataForm.link_google_map_akad){
                        return true;
                    }

                    return false;
                },
                get validationFormPrewedding(){
                    if(this.activedForm != 'form_prewedding') return false;

                    if(!this.dataForm.tanggal_jam_prewedding || !this.dataForm.alamat_prewedding || !this.dataForm.link_google_map_prewedding){
                        return true;
                    }

                    return false;
                },
                get validationFormResepsi(){
                    if(this.activedForm != 'form_resepsi') return false;

                    if(!this.dataForm.tanggal_jam_resepsi || !this.dataForm.alamat_resepsi || !this.dataForm.link_google_map_resepsi){
                        return true;
                    }

                    return false;
                },
                handleBuktiTransfer(e){
                    const file = e.target.files[0];
                    if (!file) return;

                    const allowedTypes = [
                        'image/jpeg',
                        'image/jpg',
                        'image/png',
                        'application/pdf'
                    ];
                    const maxSize = 5 * 1024 * 1024;

                    if (!allowedTypes.includes(file.type)) {
                        toastr.error('File harus berupa JPG, PNG, atau PDF!')
                        e.target.value = '';
                        this.file = null;
                        return;
                    }

                    if (file.size > maxSize) {
                        toastr.error('Ukuran file maksimal 5MB!');
                        e.target.value = '';
                        this.file = null;
                        return;
                    }

                    this.bukti_tf = file;
                },
                async submit(){
                    if(this.isLoading) return;

                    if(this.dataForm.jasa_jasa.includes('lainnya') && this.jasaLainnya.trim() !== ''){
                        this.dataForm.jasa_jasa.push(this.jasaLainnya);
                    }

                    if(this.dataForm.pemesanan_acara.includes('pemesanan_acara_lainnya') && this.pemesanan_acara_lainnya.trim() !== ''){
                        this.dataForm.pemesanan_acara.push(this.pemesanan_acara_lainnya);
                    }

                    try{
                        this.isLoading = true;

                        const formData = new FormData();
                        
                        for (const key in this.dataForm) {
                            if (Array.isArray(this.dataForm[key])) {
                                this.dataForm[key].forEach((val, i) => {
                                    formData.append(`${key}[${i}]`, val);
                                });
                            } else {
                                formData.append(key, this.dataForm[key]);
                            }
                        }

                        if(this.bukti_tf){
                            formData.append('bukti_tf', this.bukti_tf);
                        }

                        formData.append('paket', 'wedding');

                        const response = await fetch('{{ route("customer.pemesanan.store") }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: formData
                        });

                        const data = await response.json();

                        if(response.ok && data.type == 'success'){
                            Swal.fire({
                                'title' : 'Berhasil',
                                'text' : data.msg,
                                'icon' : 'success'
                            });

                            window.location.href = '{{ url('/') }}';
                        }

                    } catch (err){
                        console.error(err);
                    } finally{
                        this.isLoading = false;
                    }
                },
                init(){
                    this.$nextTick(() => {
                        const $this = this;
                        const carousel = document.getElementById('carousel-form-pemesanan');
                        carousel.addEventListener('slid.bs.carousel', event => {
                            let target = event.relatedTarget;
                            if(target.hasAttribute('data-form')){
                                $this.activedForm = target.getAttribute('data-form');
                            }
                        });
                    });

                }
            }));
        });
    </script>
@endsection