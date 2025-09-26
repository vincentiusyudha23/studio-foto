@extends('layouts.guest')

@section('content')
    <div class="w-100 d-flex justify-content-center align-items-center flex-column py-2" x-data="pemesanan">
        <div class="card" style="width: 650px;">
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-primedark fw-bold">Form Pemesanan</h3>
                </div>

                <hr>

                <div class="carousel slide" id="carousel-form-pemesanan">
                    <div class="carousel-inner mb-2">
                        <div class="carousel-item active">
                            <div>
                                {!! $description !!}
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="mb-2">
                                <label class="form-label required fw-semibold" for="nama_lengkap">Nama Lengkap</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" x-model="dataForm.nama_lengkap" name="nama_lengkap" id="nama_lengkap" required>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label required fw-semibold" for="no_hp">Nomor HP / WhatsApp</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" x-model="dataForm.no_hp" name="no_hp" id="no_hp" required>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label required fw-semibold" for="instagram">Instagram Wisudawan/ti</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" x-model="dataForm.instagram" name="instagram" id="instagram" required>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label fw-semibold" for="gelar">Gelar Wisudawan/ti <small class="fst-italic text-secondary">(Optional)</small></label>
                                <div class="form-group">
                                    <input type="text" class="form-control" x-model="dataForm.gelar" name="gelar" id="gelar">
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label required fw-semibold" for="universitas">Universitas Asal</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" x-model="dataForm.univ" name="universitas" id="universitas" required>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="mb-2">
                                <label class="form-label required fw-semibold" for="tanggal_pemotretan">Tanggal Pemotretan</label>
                                <div class="form-group">
                                    <input type="date" class="form-control" x-model="dataForm.tgl_potret" name="tanggal_pemotretan" id="tanggal_pemotretan" required>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label required fw-semibold" for="jam_pemotretan">Jam Pemotretan</label>
                                <div class="form-group">
                                    <input type="time" class="form-control" x-model="dataForm.jam_potret" name="jam_pemotretan" id="jam_pemotretan" required>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label required fw-semibold" for="lokasi_pemotretan">Lokasi / Alamat Pemotretan</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" x-model="dataForm.lokasi" name="lokasi_pemotretan" id="lokasi_pemotretan" required>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label class="form-label required fw-semibold" for="link_lokasi_pemotretan">Link Lokasi Pemotretan <small class="fst-italic text-secondary">(Google Maps)</small></label>
                                <div class="form-group">
                                    <input type="url" class="form-control" x-model="dataForm.link_lokasi" name="link_lokasi_pemotretan" id="link_lokasi_pemotretan" required>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
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
                                        <input type="text" class="form-control" x-show="dataForm.jasa_jasa.includes('lainnya')" placeholder="Lainnya..." x-model="jasaLainnya">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label class="form-label required fw-semibold">Paket yang dipesan</label>
                                <div class="px-2">
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="radio" id="single" x-model="dataForm.paket" name="paket_yg_dipesan" value="single">
                                        <label class="form-check-label" for="single">Single Graduation</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="radio" id="couple" x-model="dataForm.paket" name="paket_yg_dipesan" value="couple">
                                        <label class="form-check-label" for="couple">Couple Graduation</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="radio" id="group" x-model="dataForm.paket" name="paket_yg_dipesan" value="group">
                                        <label class="form-check-label" for="group">Group Graduation</label>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio" id="lainnya-paket" x-model="dataForm.paket" value="lainnya" name="paket_yg_dipesan">
                                            <label class="form-check-label" for="lainnya-paket">Lainnya...</label>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Lainnya..." x-show="dataForm.paket == 'lainnya'" x-model="paketLainnya">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label class="form-label fw-semibold" for="info_paket_pilihan">Nama Paket yang diambil serta Nominal Harga yang disepakati. (Jika tidak paham, silahkan hubungi admin)</label>
                                <div class="px-2">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Isi disini..." name="info_paket_pilihan" id="info_paket_pilihan" x-model="dataForm.info_paket_pilihan">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="mb-2">
                                <label class="form-label fw-semibold">Bersedia membaca, memahami, dan menyetujui syarat dan ketentuan di bagian paling atas.</label>
                                <div class="px-2">
                                    <div class="form-check form-switch mb-1">
                                        <input class="form-check-input" type="checkbox" role="switch" id="term_condition" x-model="dataForm.term_condition" name="term_condition" value="term_condition">
                                        <label class="form-check-label" for="term_condition">Iya, saya membaca, memahami, dan menyetujui syarat dan ketentuan di bagian paling atas.</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
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

                            <div class="mb-2">
                                <label class="form-label" for="bukti_tf">Bukti Transfer</label>
                                <div class="form-group">
                                    <input class="form-control" @change="handleBuktiTransfer" type="file" accept="image/*,application/pdf" name="bukti_tf" id="bukti_tf">
                                </div>
                            </div>
                        </div>
                    </div>

                    <template x-if="stepForm > 5">
                        <button x-on:click="submit" :disabled="isLoading" class="w-100 btn btn-primary mb-2 fw-semibold" type="button">
                            <i class="las la-spinner la-spin" x-show="isLoading"></i>
                            Konfirmasi
                        </button>
                    </template>

                    <div class="row">
                        <div class="col-12 mb-2" :class="stepForm <= 5 ? 'col-md-6' : ''">
                            <button class="btn btn-primary w-100 fw-semibold" x-on:click="stepForm--" :disabled="stepForm <= 1 || isLoading" type="button" data-bs-target="#carousel-form-pemesanan" data-bs-slide="prev">Kembali</button>
                        </div>
                        <div class="col-md-6 col-12 mb-2">
                            <button class="btn btn-primary w-100 fw-semibold" x-show="stepForm <= 5" x-on:click="stepForm++" :disabled="(stepForm == 2 && !stepOneValid) || (stepForm == 3 && !stepTwoValid) || (stepForm == 4 && !stepThreeValid) || (stepForm == 5 && !dataForm.term_condition)" type="button" data-bs-target="#carousel-form-pemesanan" data-bs-slide="next">Selanjutnya</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const pesanForm = {
            nama_lengkap: null,
            no_hp: null,
            instagram: null,
            gelar: null,
            univ: null,
            tgl_potret: null,
            jam_potret: null,
            lokasi: null,
            link_lokasi: null,
            jasa_jasa: [],
            paket: null,
            info_paket_pilihan: null,
            term_condition: false,
            pembayaran: null,
        };
        document.addEventListener('alpine:init', () => {
            Alpine.data('pemesanan', () => ({
                stepForm: 1,
                dataForm: pesanForm,
                jasaLainnya: null,
                paketLainnya: '',
                isLoading: false,
                bukti_tf: null,
                get stepOneValid(){
                    return this.dataForm.nama_lengkap && this.dataForm.no_hp && this.dataForm.instagram && this.dataForm.univ ? true : false;
                },
                get stepTwoValid(){
                    return this.dataForm.tgl_potret && this.dataForm.jam_potret && this.dataForm.lokasi && this.dataForm.link_lokasi ? true : false;
                },
                get stepThreeValid(){
                    return this.dataForm.jasa_jasa.length > 0 && this.dataForm.paket && this.dataForm.info_paket_pilihan ? true : false;
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

                        if(this.dataForm.paket == 'lainnya'){
                            formData.append('paket', this.paketLainnya);
                        }

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
                    
                }
            }));
        });
    </script>
@endsection