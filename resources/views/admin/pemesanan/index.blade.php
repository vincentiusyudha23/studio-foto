@extends('admin.master')

@section('title', 'Pemesanan')

@section('content')
    <div class="py-2 h-100">
        <div class="card">
            <div class="card-body">
                <livewire:pemesanan-table/>
            </div>
        </div>
    </div>
@endsection