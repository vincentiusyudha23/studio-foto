@php
    if(!isset($image)){
        $image = null;
    }
@endphp
<div class="img-card m-1 shadow-sm border rounded">
    <a href="{{ data_get($image, 'image') ?? '#' }}" class="w-100 h-100">
        <img src="{{ getThumbnail(data_get($image, 'public_id')) }}" alt="image" loading="lazy">
    </a>

    <div class="w-100 img-title py-2 px-1 rounded-bottom">
        <span>{{ data_get($image, 'title') ?? '' }}</span>

        <div class="dropend">
            <button class="btn btn-sm btn-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="las la-ellipsis-v fs-6"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Lihat</a></li>
                <li><a class="dropdown-item" href="#">Download</a></li>
                <li><a class="dropdown-item" href="#">Hapus</a></li>
            </ul>
        </div>
    </div>
</div>