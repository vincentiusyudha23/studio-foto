@extends('admin.master')

@section('title', 'Dashboard')

@section('content')
<div class="py-3">
    <div class="row">
        <!-- Client -->
        <div class="col-md-6 col-12 mb-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <i class="las la-users fs-1 text-primary"></i>
                    </div>
                    <h5 class="card-title fw-bold">Klient</h5>
                    <p class="text-muted mb-1">Total Klient</p>
                    <h2 class="fw-bold text-primary mb-3">{{ \App\Models\User::where('role', 'customer')->count() }}</h2>
                    <a href="{{  route('admin.client') }}" class="btn btn-sm btn-primary fw-semibold">
                        <i class="las la-eye me-1"></i> Lihat Klient
                    </a>
                </div>
            </div>
        </div>

        <!-- Booking -->
        <div class="col-md-6 col-12 mb-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <i class="las la-calendar-check fs-1 text-success"></i>
                    </div>
                    <h5 class="card-title fw-bold">Pemesanan</h5>
                    <p class="text-muted mb-1">Total Pemesanan</p>
                    <h2 class="fw-bold text-success mb-3">{{ \App\Models\Pemesanan::count() }}</h2>
                    <a href="{{ route('admin.pemesanan') }}" class="btn btn-sm btn-success fw-semibold">
                        <i class="las la-eye me-1"></i> Lihat Pemesanan
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <livewire:pemesanan-table :limit="5"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
