@extends('layouts.guest')

@section('content')
    <div class="w-100 d-flex flex-column gap-1 justify-content-center align-items-center pt-3">
        <h2 class="fw-bold text-primdark">Register</h2>
        <div class="card rounded-4" style="width: 450px;">
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
                <form action="{{ route('customer.request-register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="name_front">Nama Depan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="name_front" name="name_front">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="name_back">Nama Belakang</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="name_back" name="name_back">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="email">Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="no_hp">Nomor Handphone</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="no_hp" name="no_hp" inputmode="numeric" pattern="[0-9]*">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="password">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="pt-2">
                        <button type="submit" class="w-100 fw-semibold btn btn-primary">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection