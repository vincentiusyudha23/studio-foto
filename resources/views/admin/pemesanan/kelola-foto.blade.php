@extends('admin.master')

@section('title', 'Kelola Foto')

@section('content')
    <div class="py-2 h-100">
        <livewire:kelola-foto lazy="true" pemesanan_id="{{ $pemesanan->id }}" :booking_id="$pemesanan->bookingFormattedId()"/>
    </div>
@endsection