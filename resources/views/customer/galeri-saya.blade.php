@extends('layouts.guest')

@section('content')
    <div class="px-2 h-100">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h1 class="fw-semibold fs-3">Galeri Foto</h1>
                </div>

                <hr class="mb-4">

                <div class="row">
                    @if (!empty($galeri))
                        @foreach ($galeri as $image)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                                <div class="w-100 img-card m-1 shadow-sm border rounded">
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
                                                <li><a class="dropdown-item" href="{{ $image['image'] }}" target="_blank">Lihat</a></li>
                                                <li><a class="dropdown-item" href="{{ route('customer.download_foto', $image->id) }}">Download</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="h-25 col-12">
                            belum ada foto
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection