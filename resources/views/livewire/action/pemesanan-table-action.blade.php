<div class="dropdown">
    <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="dropdown">
        Aksi
    </button>

    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="{{ route(route_prefix().'pemesanan-view', ['id' => $row->id]) }}">Lihat</a>
            
            @if (auth()->user()->hasRole('admin'))
                <a class="dropdown-item" href="#">Hapus</a>
            @endif
        </li>
    </ul>
</div>