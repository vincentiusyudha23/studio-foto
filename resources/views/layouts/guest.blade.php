<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        @livewireStyles
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
        <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
        <style>
            *{
                font-family: 'Segoe UI', sans-serif;
            }
            body{
                width: 100%;
                min-height: 100dvh;
                background: linear-gradient(135deg, #ede7f6 0%, #b39ddb 60%, #fff 100%);
            }
            .nav-landing{
                width: 100%;
                height: 12%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 15px;
                padding: 10px 25px;
            }
            .nav-landing .logo{
                width: 60px;
                height: auto;
            }
            .right-menu a{
                color: white;
            }
            .right-menu a:hover{
                cursor: pointer;
                color: #333;
            }
        </style>
        @yield('style')
    </head>
    <body>
        <nav class="nav-landing">
            <div class="logo-wrapper">
                <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="logo">
            </div>
            <div class="d-flex gap-3 justify-content-start right-menu">
                <a href="{{ route('landing-page') }}" class="text-decoration-none fw-semibold fs-6">Home</a>
                <a id="about-us-menu" class="text-decoration-none fw-semibold fs-6 {{ !request()->routeIs('landing-page') ? 'd-none' : '' }}">About Us</a>
                {{-- <a class="text-decoration-none fw-semibold fs-6">Galery</a> --}}
                <a id="pricelist-menu" class="text-decoration-none fw-semibold fs-6 {{ !request()->routeIs('landing-page') ? 'd-none' : '' }}">Pricelist</a>
                @if (!auth()->check())
                    <a href="{{ route('customer.login') }}" class="text-decoration-none fw-semibold fs-6">Login</a>
                    <a href="{{ route('customer.register') }}" class="text-decoration-none fw-semibold fs-6">Register</a>
                @endif

                @if (auth()->check())

                <a href="{{ route('customer.riwayat-pemesanan') }}" class="text-decoration-none fw-semibold fs-6">Riwayat</a>
                <a href="{{ route('customer.galeri-saya') }}" class="text-decoration-none fw-semibold fs-6">Galeri</a>

                <div class="d-flex gap-1 justify-content-center align-items-center">
                    <i class="las la-user text-white fs-5"></i>
                    <form action="{{ route('customer.logout-request') }}" method="POST">
                        @csrf
                        <a href="javascript:void(0)" onclick="event.preventDefault(); this.closest('form').submit();" class="text-decoration-none fw-semibold fs-6">Logout</a>
                    </form>
                </div>
                @endif
            </div>
        </nav>

        <div class="w-100 h-100 px-2">
            @yield('content')
        </div>

        @livewireScripts
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @yield('scripts')
    </body>
</html>