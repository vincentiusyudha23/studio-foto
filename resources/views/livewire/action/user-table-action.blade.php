<div class="d-flex align-items-center gap-2">
    <a href="{{ route('admin.client.view', $row->id) }}" class="btn btn-primary fs-6 btn-sm fw-semibold">
        <i class="las la-eye"></i>
    </a>
    <button class="btn btn-danger fs-6 btn-sm fw-semibold btn-delete-client" x-on:click="deleteUser('{{ $row->id }}')">
        <i class="las la-trash"></i>
    </button>
</div>