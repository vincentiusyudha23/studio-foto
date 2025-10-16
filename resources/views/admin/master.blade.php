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
        <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
        <style>
            *{
                font-family: 'Segoe UI', sans-serif;
            }
            body{
                width: 100%;
                min-height: 100dvh;
                background: linear-gradient(135deg, #ede7f6 0%, #b39ddb 60%, #fff 100%);
                display: flex;
            }
            .sidebar-container{
                width: 20%;
                padding: 10px;
                background: white;
                border-top-right-radius: 10px;
                border-bottom-right-radius: 10px;
                transition: transform 0.3s ease-in-out;
            }

            .main-container{
                width: 80%;
                padding: 10px;
                display: flex;
                flex-direction: column;
                height: 100dvh;
            }
            .sidebar-menu{
                display: flex;
                flex-direction: column;
                gap: 15px;
                padding-top: 25px;
            }
            .sidebar-menu-item{
                width: 100%;
                border: 1px solid var(--bs-primary);
                border-radius: 10px;
                padding: 10px;
                color: #b39ddb;
                display: flex;
                align-items: center;
                gap: 5px;
                text-decoration: none;
            }
            .sidebar-menu-item i{
                color: #b39ddb;
                margin: 0;
                padding: 2px 0 0 0;
            }
            .sidebar-menu-item:hover i{
                color: white;
            }
            .sidebar-menu-item:hover{
                cursor: pointer;
                background: var(--bs-primary);
                color: white;
            }
            .sidebar-menu-item.active,
            .sidebar-menu-item.active i{
                background: var(--bs-primary);
                color: white;
            }
            .navbar{
                background: white;
                width: 100%;
                border-radius: 10px;
                flex: 0 0 auto;
            }
            .main-container .main-content{
                flex: 1 1 auto;
                overflow-y: auto;
            }

            @media (max-width: 768px) {
                .sidebar-container {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 70%;
                    max-width: 250px;
                    height: 100vh;
                    background: white;
                    z-index: 1050;
                    transform: translateX(-100%);
                    box-shadow: 0 0 10px rgba(0,0,0,0.2);
                }
                .sidebar-container.active {
                    transform: translateX(0);
                }
                .main-container {
                    width: 100%;
                }
                body.sidebar-open::before {
                    content: "";
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0,0,0,0.4);
                    z-index: 1040;
                }
            }
        </style>
        @yield('style')
    </head>
    <body>
        <div class="sidebar-container shadow-sm">
            <div class="d-flex gap-2 align-items-center px-3">
                <img src="{{ asset('assets/img/logo.png') }}" alt="logo" width="50">
                <h2 class="fs-5 fw-bold m-0 p-0 text-primary">Aster Visualism</h2>
            </div>

            <div class="sidebar-menu">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-menu-item shadow-sm fw-semibold {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="las la-tachometer-alt fs-5"></i> Dashboard
                </a>
                <a href="{{ route('admin.landing-page') }}" class="sidebar-menu-item shadow-sm fw-semibold {{ request()->routeIs('admin.landing-page') ? 'active' : '' }}">
                     <i class="las la-home fs-5"></i> Landing Page
                </a>
                <a href="{{ route('admin.galeri') }}" class="sidebar-menu-item shadow-sm fw-semibold {{ request()->routeIs('admin.galeri') ? 'active' : '' }}">
                   <i class="las la-images fs-5"></i> Galeri
                </a>
                <a href="{{ route('admin.client') }}" class="sidebar-menu-item shadow-sm fw-semibold {{ request()->routeIs('admin.client') ? 'active' : '' }}">
                   <i class="las la-user fs-5"></i> Klien
                </a>
                <a href="{{ route('admin.pemesanan') }}" class="sidebar-menu-item shadow-sm fw-semibold position-relative {{ request()->routeIs('admin.pemesanan') ? 'active' : '' }}">
                   <i class="las la-envelope fs-5"></i> Pemesanan
                    @php
                        $pesanan = \App\Models\Pemesanan::where('dilihat', 0)->count();
                    @endphp

                    @if ($pesanan > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $pesanan }}
                        <span class="visually-hidden">unread messages</span>
                    </span>
                    @endif
                </a>
            </div>
        </div>
        <div class="main-container">
            <div class="navbar d-flex justify-content-between align-items-center p-3">
                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-primary d-md-none" id="toggleSidebar">
                        <i class="las la-bars fs-4"></i>
                    </button>
                    <h5 class="text-primary m-0 p-0">@yield('title')</h5>
                </div>
                <div>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <a href="javascript:void(0)" onclick="event.preventDefault(); this.closest('form').submit();" class="text-primary text-decoration-none fw-semibold">Logout</a>
                    </form>
                </div>
            </div>
            <div class="main-content">
                @yield('content')
            </div>
        </div>

        @livewireScripts
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        @yield('scripts')

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const sidebar = document.querySelector('.sidebar-container');
                const toggleBtn = document.querySelector('#toggleSidebar');

                toggleBtn?.addEventListener('click', () => {
                    sidebar.classList.toggle('active');
                    document.body.classList.toggle('sidebar-open');
                });

                // Klik di luar sidebar untuk menutup (hanya di mobile)
                document.body.addEventListener('click', (e) => {
                    if (window.innerWidth <= 768) {
                        if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                            sidebar.classList.remove('active');
                            document.body.classList.remove('sidebar-open');
                        }
                    }
                });
            });
        </script>

    </body>
</html>