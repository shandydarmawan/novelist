<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Novelist Admin')</title>

    {{-- PLUGINS CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">

    {{-- PAGE PLUGIN --}}
    <link rel="stylesheet" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">

    {{-- MAIN STYLE --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
</head>
<body>
<div class="container-scroller">

    {{-- SIDEBAR --}}
    @include('components.admin-sidebar')

    <div class="container-fluid page-body-wrapper">

        {{-- NAVBAR --}}
        @include('components.admin-navbar')

        <div class="main-panel">
            <div class="content-wrapper">

                {{-- PAGE HEADER --}}
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card bg-dark text-white">
                            <div class="card-body d-flex align-items-center">
                                <i class="mdi mdi-book-open-page-variant icon-lg mr-3"></i>
                                <div>
                                    <h4 class="mb-0">Novelist Admin Panel</h4>
                                    <small>Kelola novel, cerita, dan konten dengan mudah</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MAIN CONTENT --}}
                @yield('content')

            </div>

            {{-- FOOTER --}}
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">
                        © {{ date('Y') }} Novelist Admin
                    </span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                        Built with ❤️ using Laravel
                    </span>
                </div>
            </footer>

        </div>
    </div>
</div>

{{-- PLUGINS JS --}}
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

{{-- PAGE PLUGIN JS --}}
<script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>

{{-- CORE JS --}}
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>

{{-- CUSTOM --}}
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>
</html>
