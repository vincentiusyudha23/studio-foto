@extends('layouts.guest')

@section('content')
    <div class="p-2 h-100">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h3 class="fw-semibold">Booking #{{ $pemesanan->bookingFormattedId() }}</h3>

                    <a href="{{ route('customer.pemesanan-view', ['id' => $pemesanan->id]) }}" class="btn btn-primary">Kembali</a>
                </div>

                <hr class="mb-3">

                <livewire:kelola-foto lazy="true" pemesanan_id="{{ $pemesanan->id }}"/>
            </div>
        </div>
    </div>
@endsection