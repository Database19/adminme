<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('css/lineicons.css') }}"/>
    <style>
        /* Add basic styles for the loading spinner */
        #loading {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(255, 255, 255, 0.7);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left-color: #000;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
    @vite('resources/sass/app.scss')
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.2.0/turbolinks.js"></script>
    <script>
        Turbolinks.start();
    </script>
</head>
<body>
    <div id="loading">
        <div class="spinner"></div>
    </div>
    <aside class="sidebar-nav-wrapper">
        <div class="navbar-logo">
            <a href="{{ route('dashboard') }}">
                <h3>LOGO DISINI</h3>
            </a>
        </div>
        <nav class="sidebar-nav">
            @include('layouts.navigation')
        </nav>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6">
                        <div class="header-left d-flex align-items-center" style="margin-left: 15px;"> <!-- Mengurangi margin kiri dari 55 menjadi 45 -->
                            <img src="{{ asset('images/logo/logo.png') }}" alt="logo" style="width: 100px; margin-right: 50px; height: 46px">
                            <div class="menu-toggle-btn">
                                <button
                                    id="menu-toggle"
                                    class="main-btn btn-hover"
                                    style="background-color: transparent; border: none;"
                                ><i class="lni lni-chevron-left"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right">
                            <!-- profile start -->
                            <div class="profile-box ml-15">
                                <button
                                    class="dropdown-toggle bg-transparent border-0"
                                    type="button"
                                    id="profile"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    <div class="profile-info">
                                        <div class="info" style="color: white">
                                            <h6 style="color: white">{{ Auth::user()->name }}</h6>
                                        </div>
                                    </div>
                                    <i class="lni lni-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                    <li>
                                        <a href="{{ route('profile.show') }}"> <i class="lni lni-user"></i> {{ __('My profile') }}</a>
                                    </li>
                                    <li>
                                        <form method="GET" action="{{ route('logout') }}">
                                        @csrf
                                        @method('GET')
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"> <i class="lni lni-exit"></i> {{ __('Logout') }}</a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <!-- profile end -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== header end ========== -->

        <!-- ========== section start ========== -->
        <section class="section">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>

        <!-- ========== footer start =========== -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-last order-md-first">
                        <div class="copyright text-md-start">
                            <p class="text-sm">
                                Designed and Developed by DedeProjectDev
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <!-- ========= All Javascript files linkup ======== -->
    @vite('resources/js/app.js')
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        document.addEventListener('turbolinks:request-start', function() {
            document.getElementById('loading').style.display = 'flex';
        });

        document.addEventListener('turbolinks:load', function() {
            document.getElementById('loading').style.display = 'none';
        });
    </script>
</body>
</html>
