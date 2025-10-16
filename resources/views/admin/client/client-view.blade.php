@extends('admin.master')

@section('title', 'Klien')

@section('content')
    <div class="py-3">
        <div class="row">
            <!-- Client -->
            <div class="col-md-6 col-12 mb-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-2">
                            <i class="las la-user fs-1 text-primary"></i>
                        </div>
                        <h5 class="card-title fw-bold text-capitalize m-0">{{ $user->full_name }}</h5>
                        <p class="text-muted m-0">{{ $user->email }}</p>
                        <p class="text-muted m-0">{{ $user->no_hp }}</p>
                    </div>
                </div>
            </div>

            <!-- Booking -->
            <div class="col-md-6 col-12 mb-3">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-2">
                                    <i class="las la-calendar-check fs-1 text-success"></i>
                                </div>
                                <h5 class="card-title fw-bold m-0">Pemesanan</h5>
                                <p class="text-muted mb-1">Total Pemesanan</p>
                                <h2 class="fw-bold text-success mb-3">{{ $user->pemesanan?->count() }}</h2>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="mb-2">
                                    <i class="las la-image fs-1 text-warning"></i>
                                </div>
                                <h5 class="card-title fw-bold m-0">Foto</h5>
                                <p class="text-muted mb-1">Total Foto</p>
                                <h2 class="fw-bold text-warning mb-3">{{ $total_foto }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <livewire:pemesanan-table :userId="$user->id"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection