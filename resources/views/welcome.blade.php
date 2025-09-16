@extends('layouts.guest')

@section('style')
    <style>
        .photos-landpage{cursor: pointer;}
        .photos-card{
            transition: all 0.6s ease;
            overflow: visible;
            max-height: 60dvh;
        }

        .photos-landpage .splide__list:hover .photos-card {
            filter: blur(2px);
            opacity: 0.4;
        }

        .photos-landpage .splide__slide:hover .photos-card {
            filter: blur(0);
            opacity: 1;
            border-color: white !important;
        }

        .photos-landpage .splide__slide:hover .photos-card>img{
            border: 2px solid white;
        }

        .photos-card > img {
            width: 285px;
            max-height: 60dvh;
            max-width: 100%;
            border-radius: 5px;
            object-fit: cover;
            object-position: center;
            transition: all 0.3s ease;
        }

        @media(min-width:768px){
            .photos-landpage{
                mask-image: linear-gradient(80deg, transparent, black 20% 90%, transparent);
            }
        }
        .about-us{
            width: 100%;
            min-height: 100dvh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 10px;
        }
        .about-us-card{
            width: 700px;
            border: 2px solid white;
            border-radius: 15px;
            padding: 25px;
        }

        .pricelist{
            width: 100%;
            min-height: 100dvh;
        }
        
        .card-pricelist{
            width: 300px;
            height: 300px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .card-pricelist:hover{
            transform: scale(1.1);
        }
    </style>
@endsection

@section('content')
    <section>
        {{-- Home Section --}}
        <div class="w-100 text-center d-flex flex-column gap-3 mt-5">
            <h1 class="text-uppercase fw-bold text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">Selamat Datang di Vendor Photography Aster Visualism</h1>
            <h4 class="text-capitalize fw-semibold text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">Abadikan Momen Bahagia Anda Bersama Kami!</h4>
        </div>
        <div class="splide mt-5 photos-landpage" id="slider-landing-page">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach ($photos ?? [] as $item)
                        <li class="splide__slide">
                            <div class="photos-card">
                                <img src="{{ $item }}" alt="img">
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- About Us Section --}}
        <div class="about-us" id="about-us-section">
            <div class="about-us-card shadow-sm d-flex flex-column text-center text-white">
                <h2 class="fw-bold fs-3">Aster Visualism</h2>
                <p class="fs-6 text-white">
                    Aster Visualism adalah vendor fotografi profesional yang siap mengabadikan momen-momen terbaik Anda.
                    Kami berpengalaman dalam berbagai event seperti pernikahan, wisuda, prewedding, dan lainnya.
                </p>
                <p class="fs-6 text-white">
                    Hubungi kami untuk info lebih lanjut dan jadwalkan sesi foto Anda!
                </p>
            </div>
        </div>

        {{-- Pricelist Section --}}
        <div class="pricelist p-5" id="pricelist-section">
            <h2 class="text-white text-uppercase fw-bold text-center" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);">PriceList</h2>
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-4 mt-5">
                <a href="{{ route('details-pricelist') }}" class="card text-decoration-none bg-transparent border border-2 border-white card-pricelist">
                    <div class="card-body text-center d-flex justify-content-center align-items-center">
                        <h3 class="text-white display-5">Graduation Photo & Video</h3>
                    </div>
                </a>
                <a href="{{ route('details-pricelist') }}" class="card text-decoration-none bg-transparent border border-2 border-white card-pricelist">
                    <div class="card-body text-center d-flex justify-content-center align-items-center">
                        <h3 class="text-white display-5">Undangan Digital</h3>
                    </div>
                </a>
                <a href="{{ route('details-pricelist') }}" class="card text-decoration-none bg-transparent border border-2 border-white card-pricelist">
                    <div class="card-body text-center d-flex justify-content-center align-items-center">
                        <h3 class="text-white display-5">Wedding & Pre-wedding</h3>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const splide = new Splide('#slider-landing-page', {
                arrows: false,
                pagination: false,
                direction: 'ltr',
                gap: 2,
                perPage: 5,
                perMove: 1,
                type: 'loop',
                speed: 3000,
                easing: 'linear',
                autoplay: true,
                interval: 3000,
                waitForTransition: false,
                breakpoints: {
                    767: {
                        perPage: 1,
                    },
                    1199: {
                        perPage: 2,
                    }
                }
            }).mount();

            document.getElementById(`slider-landing-page`).addEventListener('mouseenter', function() {
                const list = this.querySelector('.splide__list');
                const currentTransform = window.getComputedStyle(list).transform;

                list.style.transition = 'none';
                list.style.transform = currentTransform;
            });

            document.getElementById('about-us-menu').addEventListener('click', function(e){
                e.preventDefault();
                const aboutUsSection = document.getElementById('about-us-section');
                aboutUsSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });
            
            document.getElementById('pricelist-menu').addEventListener('click', function(e){
                e.preventDefault();
                const pricelistSection = document.getElementById('pricelist-section');
                pricelistSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });
        });
    </script>
@endsection