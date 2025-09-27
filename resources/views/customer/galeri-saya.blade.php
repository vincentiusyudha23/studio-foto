@extends('layouts.guest')

@section('style')
    <style>
        .img-card {
            position: relative;
            width: 200px;
            height: 200px;
            overflow: hidden;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .img-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1) !important;
        }
        
        .img-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .img-card:hover img {
            transform: scale(1.05);
        }
        
        .img-title {
            background-color: #f8f9fa;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            transition: background-color 0.3s ease;
        }
        
        .img-card:hover .img-title {
            background-color: #e9ecef;
        }

        .img-card:hover .img-title>span{
            color: black;
        }
        
        .img-title span {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 70%;
        }

        @media (max-width: 768px) {
            .img-card {
                width: 150px;
                height: 180px;
            }
            
            .img-card img {
                height: 140px;
            }
            
            .img-title {
                font-size: 0.8rem;
            }
        }

        @media (max-width: 576px) {
            .img-card {
                width: 100%;
                max-width: 250px;
                height: auto;
            }
            
            .d-flex.flex-wrap {
                justify-content: center !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="px-2 h-100">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title mb-2 fw-bold fs-3 text-primary">
                    <i class="las la-images me-2"></i> Galeri Foto
                </h1>
            </div>
            <div class="card-body">
                <p class="text-muted mb-0">Total Foto: <span class="fw-semibold">{{ count($galeri ?? []) }}</span></p>
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start gap-3">
                    @if (!empty($galeri))
                        @foreach ($galeri as $image)
                            <div class="img-card m-1 shadow-sm border">
                                <a href="{{ data_get($image, 'image') ?? '#' }}" class="w-100 h-100 d-block" target="_blank">
                                    <img src="{{ getThumbnail(data_get($image, 'public_id')) }}" alt="image" loading="lazy">
                                </a>

                                <div class="w-100 img-title py-2 px-2">
                                    <span class="fw-medium" title="{{ data_get($image, 'title') ?? '' }}">{{ data_get($image, 'title') ?? 'Untitled' }}</span>

                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="las la-ellipsis-v fs-6"></i>
                                        </button>
                                        <ul class="dropdown-menu shadow">
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2" href="{{ $image['image'] }}" target="_blank">
                                                    <i class="las la-eye"></i> Lihat
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('customer.download_foto', $image->id) }}"">
                                                    <i class="las la-download"></i> Download
                                                </a>
                                            </li>
                                        </ul>
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