@extends('admin.master')

@section('title', 'Pemesanan')

@section('content')
    @php
        $metadata = json_decode($pemesanan->metadata, true);
    @endphp
    <div class="py-2 h-100">
        <div class="card">
            <div class="card-body">
                <div class="w-100 d-flex justify-content-between align-items-center">
                    <h4 class="fw-semibold">Booking ID #{{ $pemesanan->bookingFormattedId() }}</h4>

                    <a href="{{ route('admin.pemesanan.kelola-foto', ['id' => $pemesanan->id]) }}" class="btn btn-primary fw-semibold">Kelola Foto</a>
                </div>

                <hr class="mb-2">

                <div>
                    <h4 class="fw-semibold text-secondary mb-3">Detail Pesanan</h4>

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
                                    <label class="form-label fw-semibold">Paket yang dipesan</label>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" {{ data_get($metadata, 'paket') == 'single' ? 'checked' : '' }} type="radio" id="single" name="paket_yg_dipesan" disabled value="single">
                                        <label class="form-check-label" for="single">Single Graduation</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" {{ data_get($metadata, 'paket') == 'couple' ? 'checked' : '' }} type="radio" id="couple" name="paket_yg_dipesan" disabled value="couple">
                                        <label class="form-check-label" for="couple">Couple Graduation</label>
                                    </div>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" {{ data_get($metadata, 'paket') == 'group' ? 'checked' : '' }} type="radio" id="group" name="paket_yg_dipesan" disabled value="group">
                                        <label class="form-check-label" for="group">Group Graduation</label>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check mb-1">
                                            <input class="form-check-input" type="radio" {{ !in_array(data_get($metadata, 'paket'), ['group', 'couple', 'single']) ? 'checked' : '' }} id="lainnya-paket" value="lainnya" disabled name="paket_yg_dipesan">
                                            <label class="form-check-label" for="lainnya-paket">Lainnya...</label>
                                        </div>
                                        @if (!in_array(data_get($metadata, 'paket'), ['group', 'couple', 'single']))
                                            <input type="text" class="form-control" disabled value="{{ data_get($metadata, 'paket') }}">
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