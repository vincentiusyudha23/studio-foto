<div class="dropdown">
    <button class="btn btn-sm btn-primary" type="button" data-bs-toggle="dropdown">
        Aksi
    </button>

    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route(route_prefix().'pemesanan-view', ['id' => $row->id]) }}">
                <i class="las la-eye"></i> Lihat
            </a>
        </li>
        @if (auth()->user()->hasRole('admin') && $row->status != 'selesai')  
            <li>
                <a class="dropdown-item d-flex align-items-center gap-2 text-success" href="#" wire:click.prevent="update_status('{{ $row->id }}')">
                    <i class="las la-check"></i> Selesai
                </a>
            </li>
        @endif
        @if (auth()->user()->hasRole('admin'))
            <li><hr class="dropdown-divider"></li>

            <li>
                <a class="dropdown-item d-flex align-items-center gap-2 text-danger" href="#" wire:click.prevent="delete('{{ $row->id }}')">
                    <i class="las la-trash"></i> Hapus
                </a>
            </li>
        @endif
    </ul>
</div>