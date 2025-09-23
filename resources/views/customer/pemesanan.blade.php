@extends('layouts.guest')

@section('content')
    <div class="w-100 d-flex justify-content-center align-items-center flex-column py-2">
        @php
            $user = auth()->user();
        @endphp
        <h2 class="text-primedark fw-bold">Pemesanan</h2>
        <div class="card rounded-4" style="width: 650px;">
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('customer.pemesanan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="nama">Nama</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="nama" required id="nama" value="{{ $user->full_name }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="no_hp">Nomor Handphone</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="no_hp" required id="no_hp" value="{{ $user->no_hp }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="email">Email</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="email" required id="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="paket">Pilih Paket</label>
                        <select class="form-select" required name="tipe_paket" id="paket">
                            <option value="">Pilih Paket</option>
                            <option value="1">Single Basic Package (Graduation Photo & Video)</option>
                            <option value="2">Single Standard Package (Graduation Photo & Video)</option>
                            <option value="3">Single Premium Package (Graduation Photo & Video)</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-semibold" for="tanggal">Tanggal Pelaksanaan</label>
                        <div class="input-group">
                            <input type="date" name="tanggal" id="tanggal" required class="form-control">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary w-100" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection