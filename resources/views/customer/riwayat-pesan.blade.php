@extends('layouts.guest')

@section('content')
    <div class="px-3">
        <div class="w-100 text-center mb-2">
            <h2 class="fw-bold">Riwayat Pemesanan</h2>
        </div>

        <div class="card">
            <div class="card-body">
                <livewire:pemesanan-table :userId="auth()->user()->id"/>
            </div>
        </div>
    </div>
@endsection