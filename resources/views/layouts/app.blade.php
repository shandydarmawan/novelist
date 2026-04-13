<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Novelist')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('users/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/elegant-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/style.css') }}">

    <style>
        body { background:#0b0c10; color:#fff; }

        h1,h2,h3,h4,h5,h6,
        .navbar-brand strong,
        .nav-link { color:#ffffff !important; }

        /* ACCOUNT MENU */
        .account-menu {
            position: absolute;
            top: 48px; right: 0;
            background: #151515;
            border-radius: 10px;
            width: 200px;
            display: none;
            z-index: 9999;
            padding: 10px 0;
        }
        .account-menu.show { display: block; }
        .account-name {
            padding: 8px 16px;
            font-size: 14px;
            color: #aaa;
            border-bottom: 1px solid #222;
        }
        .account-link {
            display: block;
            padding: 10px 16px;
            color: #fff;
            text-decoration: none;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
        }
        .account-link:hover { background: #222; }
        .account-link.logout { color: #ff5b5b; }

        .notice-login {
            display: flex;
            gap: 12px;
            background: #151515;
            border-left: 4px solid #7c4dff;
            padding: 14px 18px;
            border-radius: 8px;
            font-size: 14px;
            color: #ddd;
        }

        /* ── OVERRIDE style.css yang sembunyikan navbar di HP ── */
        .slicknav_menu { display: none !important; }

        .header {
            background: #070720 !important;
            position: sticky !important;
            top: 0 !important;
            z-index: 1030 !important;
        }

        /* Search laptop */
        .navbar-search-desktop { display: none; }
        @media (min-width: 992px) {
            .navbar-search-desktop { display: flex !important; }
            .navbar-search-mobile  { display: none !important; }
        }

        /* ── HP: semua menu langsung tampil tanpa hamburger ── */
        @media (max-width: 991.98px) {
            .navbar { flex-wrap: wrap !important; padding: 8px 0 !important; }
            .navbar-toggler { display: none !important; }
            .navbar-brand { order: 1; }

            /* Search icon wrap di HP — sembunyikan, pakai search-mobile */
            #searchWrap { display: none !important; }

            #mainNav {
                display: flex !important;
                width: 100% !important;
                order: 3;
            }
            .navbar-search-mobile {
                display: block !important;
                order: 2;
                width: 100%;
                margin: 6px 0 2px;
            }
            #mainNav .navbar-nav {
                flex-direction: row !important;
                flex-wrap: wrap !important;
                justify-content: center !important;
                gap: 0 !important;
                padding: 4px 0 4px !important;
                width: 100% !important;
            }
            #mainNav .navbar-nav .nav-link {
                padding: 6px 10px !important;
                font-size: 13px !important;
            }
            #mainNav .position-relative { position: static !important; }
            .account-menu {
                position: static !important;
                width: 100% !important;
                border-radius: 8px !important;
                margin-top: 4px !important;
            }
        }
    </style>

    @stack('styles')
</head>
<body>

<!-- NAVBAR -->
<header class="header sticky-top">
    <div class="container-fluid px-4">
        <nav class="navbar navbar-expand-lg navbar-dark">

            <!-- BRAND -->
            <a class="navbar-brand d-flex align-items-center gap-2"
               href="{{ route('user.home') }}">
                <img src="{{ asset('users/img/novelist-logo.jpg') }}"
                     style="height:38px;width:38px;object-fit:cover;border-radius:50%;
                            border:2px solid rgba(167,139,250,0.7);flex-shrink:0;">
                <strong style="font-size:15px;letter-spacing:2px;color:#fff;">NOVELIST</strong>
            </a>



            <!-- MENU LINKS -->
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.explore') }}">Explore</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('genre.index') }}">Genre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.library') }}">Library</a>
                    </li>

                    @auth
                    <li class="nav-item position-relative">
                        <a href="javascript:void(0)" id="accountToggle" class="nav-link">
                            <i class="fa fa-user-circle fs-5"></i>
                        </a>
                        <div id="accountMenu" class="account-menu">
                            <div class="account-name">{{ Auth::user()->name }}</div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="account-link logout">
                                    <i class="fa fa-sign-out"></i> Logout
                                </button>
                            </form>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fa fa-user-circle fs-5"></i>
                        </a>
                    </li>
                    @endauth
                </ul>
                            <!-- SEARCH LAPTOP: ikon saja, expand saat diklik -->
            <div id="searchWrap" class="d-none d-lg-flex align-items-center ms-3"
                 style="position:relative;">
                <button id="searchToggle" type="button"
                        style="background:none;border:none;cursor:pointer;padding:5px 7px;
                               color:rgba(255,255,255,0.65);display:flex;align-items:center;
                               border-radius:50%;transition:background .2s;"
                        onmouseover="this.style.background='rgba(255,255,255,0.08)'"
                        onmouseout="this.style.background='none'">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                </button>
                <form id="searchForm" action="{{ route('user.search') }}" method="GET"
                      style="position:absolute;left:36px;top:50%;transform:translateY(-50%);
                             width:0;overflow:hidden;transition:width .35s cubic-bezier(.4,0,.2,1);">
                    <input id="searchInput" type="text" name="q"
                           style="width:220px;background:rgba(255,255,255,0.07);color:#fff;
                                  border:1px solid rgba(255,255,255,0.18);border-radius:20px;
                                  padding:5px 14px;font-size:13px;outline:none;white-space:nowrap;"
                           placeholder="Cari novel...">
                </form>
            </div>
            </div>

            <!-- HAMBURGER (disembunyikan via CSS di HP) -->
            <button class="navbar-toggler ms-2" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- SEARCH HP: full width di bawah brand -->
            <form action="{{ route('user.search') }}" method="GET"
                  class="navbar-search-mobile">
                <div style="position:relative;">
                    <svg style="position:absolute;left:10px;top:50%;transform:translateY(-50%);
                                opacity:.45;pointer-events:none;"
                         width="13" height="13" viewBox="0 0 24 24" fill="none"
                         stroke="#fff" stroke-width="2">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    <input type="text" name="q"
                           class="form-control bg-dark text-white border-secondary"
                           style="padding-left:32px;border-radius:20px;font-size:13px;"
                           placeholder="Cari novel...">
                </div>
            </form>

        </nav>
    </div>
</header>

<!-- CONTENT -->
@yield('content')

<!-- FOOTER -->
<footer class="footer bg-dark py-4 mt-5">
    <div class="container text-center">
        <p class="mb-0 text-muted">
            © {{ date('Y') }} Novelist — Web Novel Platform
        </p>
    </div>
</footer>

<!-- JS -->
<script src="{{ asset('users/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('users/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('users/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('users/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('users/js/main.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // Account dropdown
    const toggle = document.getElementById('accountToggle');
    const menu   = document.getElementById('accountMenu');
    if (toggle && menu) {
        toggle.addEventListener('click', function (e) {
            e.stopPropagation();
            menu.classList.toggle('show');
        });
        document.addEventListener('click', function () {
            menu.classList.remove('show');
        });
    }

    // Search expand (laptop)
    const searchToggle = document.getElementById('searchToggle');
    const searchForm   = document.getElementById('searchForm');
    const searchInput  = document.getElementById('searchInput');
    let searchOpen = false;

    if (searchToggle && searchForm && searchInput) {
        searchToggle.addEventListener('click', function (e) {
            e.stopPropagation();
            searchOpen = !searchOpen;
            searchForm.style.width = searchOpen ? '230px' : '0';
            if (searchOpen) setTimeout(() => searchInput.focus(), 350);
        });
        document.addEventListener('click', function (e) {
            if (searchForm && !searchForm.contains(e.target) && e.target !== searchToggle) {
                searchOpen = false;
                searchForm.style.width = '0';
            }
        });
    }
});
</script>

@stack('scripts')
</body>
</html>