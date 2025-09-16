@extends('admin.master')

@section('title', 'Pemesanan')

@section('content')
    <div class="py-3">
        <div class="card rounded-3 w-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>No. Handphone</th>
                                <th>Email</th>
                                <th>Tipe Paket</th>
                                <th>Tanggal Pelaksanaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemesanan as $pesan)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $pesan->nama }}</td>
                                    <td>{{ $pesan->no_hp }}</td>
                                    <td>{{ $pesan->email }}</td>
                                    <td>
                                        @if ($pesan->tipe_paket == 1)
                                            Single Basic Package (Graduation Photo & Video)
                                        @endif
                                        @if ($pesan->tipe_paket == 2)
                                            Single Standard Package (Graduation Photo & Video)
                                        @endif
                                        @if ($pesan->tipe_paket == 3)
                                            Single Premium Package (Graduation Photo & Video)
                                        @endif
                                    </td>
                                    <td>{{ $pesan->tanggal_pelaksanaan->locale('id')->translatedFormat('l, d F Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection