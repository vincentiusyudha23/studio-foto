@extends('admin.master')

@section('title', 'Klien')

@section('content')
    <div class="py-2 h-100">
        <div class="card" style="min-height: 200px;">
            <div class="card-body">
                <livewire:client-table/>
                {{-- <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div> --}}
            </div>
        </div>
    </div>
@endsection