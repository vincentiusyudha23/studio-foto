@extends('layouts.guest')

@section('content')
    @php
        $metadata = json_decode($pemesanan->metadata, true);
    @endphp
    <div class="py-2 h-100 px-2">
        <div class="card">
            <div class="card-body">
                <div class="w-100 d-flex justify-content-between align-items-center">
                    <h4 class="fw-semibold">Booking ID #{{ $pemesanan->bookingFormattedId() }}</h4>

                    <a href="{{ route('customer.lihat-foto', ['id' => $pemesanan->id]) }}" class="btn btn-primary fw-semibold">Lihat Foto</a>
                </div>

                <hr class="mb-2">

                <div>
                    <h4 class="fw-semibold text-secondary mb-3">Detail Pesanan</h4>

                    @if (data_get($metadata, 'paket') == 'wisuda')
                        <div class="row">
                            <div class="col-12 col-md-6 mb-2">
                                <div class="mb-2">
                                    <label class="form-label fw-semibold" for="nama_lengkap">Nama Lengkap</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" disabled value="{{ data_get($metadata, 'nama_lengkap') }}">
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <label class="form-label fw-semibold" for="no_hp">Nomor HP / WhatsApp</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ data_get($metadata, 'no_hp') }}" name="no_hp" id="no_hp" disabled>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-semibold" for="instagram">Instagram Wisudawan/ti</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ data_get($metadata, 'instagram') }}" name="instagram" id="instagram" disabled>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-semibold" for="gelar">Gelar Wisudawan/ti <small class="fst-italic text-secondary">(Optional)</small></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ data_get($metadata, 'gelar') }}" name="gelar" id="gelar" disabled>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-semibold" for="universitas">Universitas Asal</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ data_get($metadata, 'univ') }}" name="universitas" id="universitas" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-2">
                                    <label class="form-label fw-semibold" for="tanggal_pemotretan">Tanggal Pemotretan</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" disabled value="{{ data_get($metadata, 'tgl_potret') }}" name="tanggal_pemotretan" id="tanggal_pemotretan">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-semibold" for="jam_pemotretan">Jam Pemotretan</label>
                                    <div class="form-group">
                                        <input type="time" class="form-control" disabled value="{{ data_get($metadata, 'jam_potret') }}" name="jam_pemotretan" id="jam_pemotretan">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-semibold" for="lokasi_pemotretan">Lokasi / Alamat Pemotretan</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" disabled value="{{ data_get($metadata, 'lokasi') }}" name="lokasi_pemotretan" id="lokasi_pemotretan">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-semibold" for="link_lokasi_pemotretan">Link Lokasi Pemotretan <small class="fst-italic text-secondary">(Google Maps)</small></label>
                                    <div class="form-group">
                                        <input type="url" class="form-control" disabled value="{{ data_get($metadata, 'link_lokasi') }}" name="lokasi_pemotretan" id="link_lokasi_pemotretan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (data_get($metadata, 'paket') == 'wedding')
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Nama Mempelai Pria</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" disabled value="{{ data_get($metadata, 'nama_lengkap_pria') }}">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Instagram Pria</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" disabled value="{{ data_get($metadata, 'instagram_pria') }}">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">WhatsApp Pria</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" disabled value="{{ data_get($metadata, 'whatsapp_pria') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Nama Mempelai wanita</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" disabled value="{{ data_get($metadata, 'nama_lengkap_wanita') }}">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Instagram wanita</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" disabled value="{{ data_get($metadata, 'instagram_wanita') }}">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">WhatsApp wanita</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" disabled value="{{ data_get($metadata, 'whatsapp_wanita') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <hr class="mb-2">

                <div>
                    <h4 class="fw-semibold text-secondary mb-3">Detail Paket</h4>

                    <div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-2">
                                    <label class="form-label fw-semibold">Jasa-jasa yang di pesan</label>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" {{ in_array('fotografi', data_get($metadata, 'jasa_jasa')) ? 'checked' : '' }} type="checkbox" id="fotografi" value="fotografi" disabled>
                                        <label class="form-check-label" for="fotografi">Fotografi</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="checkbox" {{ in_array('videografi', data_get($metadata, 'jasa_jasa')) ? 'checked' : '' }} id="videografi" value="videografi" disabled>
                                        <label class="form-check-label" for="videografi">Videografi</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="checkbox" id="makeup" value="makeup" {{ in_array('makeup', data_get($metadata, 'jasa_jasa')) ? 'checked' : '' }} disabled>
                                        <label class="form-check-label" for="makeup">Make-Up</label>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="checkbox" id="lainnya" {{ in_array('lainnya', data_get($metadata, 'jasa_jasa')) ? 'checked' : '' }} value="lainnya" disabled>
                                            <label class="form-check-label" for="lainnya">Lainnya...</label>
                                        </div>
                                        @php
                                            $jasaLainnya = array_filter(data_get($metadata, 'jasa_jasa'), function($item){
                                                return !in_array($item, ['fotografi', 'videografi', 'makeup', 'lainnya']);
                                            });
                                        @endphp
                                        @if (!empty($jasaLainnya))
                                            <input type="text" class="form-control" value="{{ implode(', ', $jasaLainnya) }}" disabled>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-2">
                                    <label class="form-label fw-semibold">Pemesanan Acara</label>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" {{ in_array('lamaran', data_get($metadata, 'pemesanan_acara')) ? 'checked' : '' }} type="checkbox" id="lamaran" value="lamaran" disabled>
                                        <label class="form-check-label" for="lamaran">Lamaran</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="checkbox" {{ in_array('akad', data_get($metadata, 'pemesanan_acara')) ? 'checked' : '' }} id="akad" value="akad" disabled>
                                        <label class="form-check-label" for="akad">Akad</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="checkbox" id="resepsi" value="resepsi" {{ in_array('resepsi', data_get($metadata, 'pemesanan_acara')) ? 'checked' : '' }} disabled>
                                        <label class="form-check-label" for="resepsi">Resepsi</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="checkbox" id="prewedding" value="prewedding" {{ in_array('prewedding', data_get($metadata, 'pemesanan_acara')) ? 'checked' : '' }} disabled>
                                        <label class="form-check-label" for="prewedding">Pre-Wedding</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="checkbox" id="aqiqah" value="aqiqah" {{ in_array('aqiqah', data_get($metadata, 'pemesanan_acara')) ? 'checked' : '' }} disabled>
                                        <label class="form-check-label" for="aqiqah">Aqiqah</label>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="checkbox" id="lainnya" {{ in_array('lainnya', data_get($metadata, 'pemesanan_acara')) ? 'checked' : '' }} value="lainnya" disabled>
                                            <label class="form-check-label" for="lainnya">Lainnya...</label>
                                        </div>
                                        @php
                                            $pemesanan_acara_lainnya = array_filter(data_get($metadata, 'pemesanan_acara'), function($item){
                                                return !in_array($item, ['lamaran', 'akad', 'resepsi', 'prewedding', 'aqiqah', 'lainnya']);
                                            });
                                        @endphp
                                        @if (!empty($pemesanan_acara_lainnya))
                                            <input type="text" class="form-control" value="{{ implode(', ', $pemesanan_acara_lainnya) }}" disabled>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label fw-semibold" for="info_paket_pilihan">Nama Paket yang diambil serta Nominal Harga yang disepakati. (Jika tidak paham, silahkan hubungi admin)</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Isi disini..." name="info_paket_pilihan" id="info_paket_pilihan" value="{{ data_get($metadata, 'info_paket_pilihan') }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if (data_get($metadata, 'paket') == 'wedding')
                    @if (data_get($metadata, 'tanggal_jam_lamaran_aqiqah') != 'null')
                        <hr class="mb-2">
                        <div>
                            <h4 class="fw-semibold text-secondary mb-3">Detail Lokasi & Tanggal Acara <small class="fst-italic text-muted">(Lamaran/Aqiqah/Event)</small></h4>
                            
                            <div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold">Tanggal</label>
                                            <div class="form-group">
                                                <input type="date" class="form-control" disabled value="{{ Carbon\Carbon::parse(data_get($metadata, 'tanggal_jam_lamaran_aqiqah'))->format('Y-m-d') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold">Jam</label>
                                            <div class="form-group">
                                                <input type="time" class="form-control" disabled value="{{ Carbon\Carbon::parse(data_get($metadata, 'tanggal_jam_lamaran_aqiqah'))->format('H:i') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold">Alamat</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" disabled value="{{ data_get($metadata, 'alamat_lamaran_aqiqah') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold">Link Google Maps</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" disabled value="{{ data_get($metadata, 'link_google_map_lamaran_aqiqah') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    @endif
                    @if (data_get($metadata, 'tanggal_jam_akad') != 'null')
                        <hr class="mb-2">
                        <div>
                            <h4 class="fw-semibold text-secondary mb-3">Detail Lokasi & Tanggal Acara <small class="fst-italic text-muted">(Akad)</small></h4>
                            
                            <div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold">Tanggal</label>
                                            <div class="form-group">
                                                <input type="date" class="form-control" disabled value="{{ Carbon\Carbon::parse(data_get($metadata, 'tanggal_jam_akad'))->format('Y-m-d') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold">Jam</label>
                                            <div class="form-group">
                                                <input type="time" class="form-control" disabled value="{{ Carbon\Carbon::parse(data_get($metadata, 'waktu_acara'))->format('H:i') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold">Alamat</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" disabled value="{{ data_get($metadata, 'alamat_akad') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold">Link Google Maps</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" disabled value="{{ data_get($metadata, 'link_google_map_akad') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    @endif
                    @if (data_get($metadata, 'tanggal_jam_resepsi') != 'null')
                        <hr class="mb-2">
                        <div>
                            <h4 class="fw-semibold text-secondary mb-3">Detail Lokasi & Tanggal Acara <small class="fst-italic text-muted">(Resepsi)</small></h4>
                            
                            <div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold">Tanggal</label>
                                            <div class="form-group">
                                                <input type="date" class="form-control" disabled value="{{ Carbon\Carbon::parse(data_get($metadata, 'tanggal_jam_resepsi'))->format('Y-m-d') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold">Jam</label>
                                            <div class="form-group">
                                                <input type="time" class="form-control" disabled value="{{ Carbon\Carbon::parse(data_get($metadata, 'waktu_acara'))->format('H:i') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold">Alamat</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" disabled value="{{ data_get($metadata, 'alamat_resepsi') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold">Link Google Maps</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" disabled value="{{ data_get($metadata, 'link_google_map_resepsi') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    @endif
                    @if (data_get($metadata, 'tanggal_jam_prewedding') != 'null')
                        <hr class="mb-2">
                        <div>
                            <h4 class="fw-semibold text-secondary mb-3">Detail Lokasi & Tanggal Acara <small class="fst-italic text-muted">(Pre-Wedding)</small></h4>
                            
                            <div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold">Tanggal</label>
                                            <div class="form-group">
                                                <input type="date" class="form-control" disabled value="{{ Carbon\Carbon::parse(data_get($metadata, 'tanggal_jam_prewedding'))->format('Y-m-d') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold">Jam</label>
                                            <div class="form-group">
                                                <input type="time" class="form-control" disabled value="{{ Carbon\Carbon::parse(data_get($metadata, 'waktu_acara'))->format('H:i') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold">Alamat</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" disabled value="{{ data_get($metadata, 'alamat_prewedding') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label fw-semibold">Link Google Maps</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" disabled value="{{ data_get($metadata, 'link_google_map_prewedding') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    @endif
                @endif

                <hr class="mb-2">

                <div>
                    <h4 class="fw-semibold text-secondary mb-3">Detail Pembayaran</h4>

                    <div class="mb-2">
                        <label class="form-label fw-semibold">Metode Pembayaran</label>
                        <div class="form-group">
                            <input class="form-control" type="text" disabled value="{{ getMetodePembayaran(data_get($metadata, 'pembayaran', 0)) }}">
                        </div>
                    </div>

                    @if (data_get($metadata, 'pembayaran') != 4 && !empty(data_get($metadata, 'bukti_tf')))
                        <div class="mb-2 w-100">
                            <a href="{{ data_get($metadata, 'bukti_tf') }}" target="_blank">
                                <img src="{{data_get($metadata, 'bukti_tf')}}" width="350" height="auto" class="rounded"/>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection