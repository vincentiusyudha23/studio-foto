@extends('admin.master')

@section('title', 'Kelola Foto')

@section('content')
    <div class="py-2 h-100">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h4 class="fw-semibold">Booking ID #{{ $pemesanan->bookingFormattedId() }}</h4>

                    <a class="btn btn-danger" href="{{ route('admin.pemesanan-view', $pemesanan->id) }}">Kembali</a>
                </div>

                <hr class="mb-3">

                <livewire:kelola-foto lazy="true" pemesanan_id="{{ $pemesanan->id }}"/>
            </div>
        </div>
    </div>
@endsection