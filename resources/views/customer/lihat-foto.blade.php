@extends('layouts.guest')

@section('content')
    <div class="p-2 h-100">
        <livewire:kelola-foto lazy="true" pemesanan_id="{{ $pemesanan->id }}" :booking_id="$pemesanan->bookingFormattedId()"/>
    </div>
@endsection