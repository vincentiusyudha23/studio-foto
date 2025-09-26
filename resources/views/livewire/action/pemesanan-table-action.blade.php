<div class="dropdown">
    <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="dropdown">
        Aksi
    </button>

    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item" href="{{ route('admin.pemesanan-view', ['id' => $row->id]) }}">Lihat</a>
            <a class="dropdown-item" href="#">Hapus</a>
        </li>
    </ul>
</div>