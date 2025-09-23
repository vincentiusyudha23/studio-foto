@extends('admin.master')

@section('title', 'Galeri')

@section('content')
    <div class="py-2 h-100">
        <livewire:gallery-page lazy="true"/>
    </div>
@endsection