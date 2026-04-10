<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Novelist | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('users/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/elegant-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/style.css') }}">

    <style>
        body { background:#0b0c10; color:#f5f5f5; }

        h1,h2,h3,h4,h5,h6,
        .navbar-brand strong,
        .nav-link,
        .novel-title { color:#ffffff !important; }

        p, span, small, label { color:#e6e6e6 !important; }
        .text-muted { color:#d0d0d0 !important; }
        input::placeholder { color:#d0d0d0 !important; }

        /* ── KUNCI: override style.css yang sembunyikan navbar di HP ── */
        /* style.css punya: .header__menu { display:none } di media HP    */
        /* kita paksa navbar Bootstrap tetap tampil dengan override ini    */
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
            .navbar-search-desktop { display: block !important; }
            .navbar-search-mobile  { display: none !important; }
        }

        /* ── HP: tampilkan semua menu tanpa hamburger ── */
        @media (max-width: 991.98px) {

            /* Susun navbar jadi kolom */
            .navbar {
                flex-wrap: wrap !important;
                padding: 8px 0 !important;
            }

            /* Sembunyikan hamburger — menu langsung tampil */
            .navbar-toggler { display: none !important; }

            /* Collapse selalu terbuka di HP */
            #mainNav {
                display: flex !important;
                width: 100% !important;
                order: 3;
            }

            /* Search HP full width, muncul di bawah brand */
            .navbar-search-mobile {
                display: block !important;
                order: 2;
                width: 100%;
                margin: 6px 0 2px;
            }

            .navbar-brand { order: 1; }

            /* Links berjejer horizontal */
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

            /* Account dropdown jangan posisi absolute di HP */
            #mainNav .position-relative { position: static !important; }
            .account-menu {
                position: static !important;
                width: 100% !important;
                border-radius: 8px !important;
                margin-top: 4px !important;
            }
        }

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
            color: #eaeaea;
            border-bottom: 1px solid #222;
        }
        .account-link {
            display: block;
            padding: 10px 16px;
            color: #ffffff;
            text-decoration: none;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
        }
        .account-link:hover { background: #222; }
        .account-link.logout { color: #ff7b7b; }

        /* NOVEL GRID */
        .novel-grid {
            display: grid;
            grid-template-columns: repeat(6, minmax(0,1fr));
            gap: 14px;
        }
        @media (max-width: 992px) { .novel-grid { grid-template-columns: repeat(4, minmax(0,1fr)); } }
        @media (max-width: 600px) { .novel-grid { grid-template-columns: repeat(3, minmax(0,1fr)); } }

        .novel-card { display:flex; flex-direction:column; cursor:pointer; }
        .novel-cover-wrap {
            position:relative; width:100%; aspect-ratio:2/3;
            border-radius:6px; overflow:hidden; background:#1a1a1a;
        }
        .novel-cover-wrap img {
            width:100%; height:100%; object-fit:cover;
            display:block; transition:transform 0.25s ease;
        }
        .novel-card:hover .novel-cover-wrap img { transform:scale(1.05); }

        .badge-up {
            position:absolute; top:6px; left:6px;
            background:#e8380d; color:#fff;
            font-size:9px; font-weight:700;
            padding:2px 5px; border-radius:3px;
            letter-spacing:.5px; text-transform:uppercase; z-index:2;
        }
        .novel-name {
            font-size:12px !important; font-weight:500;
            color:#ffffff !important; line-height:1.3;
            margin:6px 0 5px;
            display:-webkit-box; -webkit-line-clamp:2;
            -webkit-box-orient:vertical; overflow:hidden;
        }
        .chapter-list { display:flex; flex-direction:column; gap:3px; }
        .chapter-row {
            display:flex; align-items:center; justify-content:space-between;
            background:#1c1c1c; border-radius:4px; padding:3px 7px;
            border:1px solid #2a2a2a; text-decoration:none;
        }
        .chapter-row:hover { background:#252525; }
        .chapter-num { font-size:11px !important; color:#cccccc !important; }
        .chapter-time { font-size:10px !important; color:#888888 !important; }

        .notice-login {
            display:flex; gap:12px; padding:14px 18px;
            border-radius:8px; font-size:14px;
            animation:fadeSlide .5s ease;
        }
        .notice-guest { background:#151515; border-left:4px solid #7c4dff; }
        .notice-user {
            background:linear-gradient(135deg,#1f4037,#99f2c8);
            border-left:4px solid #00c853; color:#0b0c10;
            box-shadow:0 0 10px rgba(0,255,150,.3);
        }
        .notice-user i { color:#00e676; }

        @keyframes fadeSlide {
            from { opacity:0; transform:translateY(-10px); }
            to   { opacity:1; transform:translateY(0); }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<header class="header sticky-top">
    <div class="container-fluid px-4">
        <nav class="navbar navbar-expand-lg navbar-dark">

            <!-- BRAND: foto logo bulat + NOVELIST -->
            <a class="navbar-brand d-flex align-items-center gap-2"
               href="{{ route('user.home') }}">
                <img src="{{ asset('users/img/novelist-logo.jpg') }}"
                     style="height:38px;width:38px;object-fit:cover;border-radius:50%;
                            border:2px solid rgba(167,139,250,0.7);flex-shrink:0;">
                <strong style="font-size:15px;letter-spacing:2px;color:#fff;">NOVELIST</strong>
            </a>

            <!-- SEARCH LAPTOP: ikon saja, expand ke kiri saat diklik -->
           

            <!-- MENU LINKS (laptop) -->
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
            

            <!-- HAMBURGER (HP) -->
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

<!-- HERO -->
<section class="hero py-4">
    <div class="container">
        <div class="hero__items rounded"
             style="background:url('{{ asset('users/img/hero/hero-1.jpg') }}') center/cover;
                    height:260px;">
        </div>
    </div>
</section>

<!-- NOTICE -->
<div class="container mt-3">
    @guest
    <div class="notice-login notice-guest">
        <i class="fa fa-info-circle"></i>
        <span>Kamu bisa membaca novel tanpa login. Login hanya untuk <strong>Favorite</strong>.</span>
    </div>
    @endguest

    @auth
    <div class="notice-login notice-user">
        <i class="fa fa-check-circle"></i>
        <span>
            Selamat datang, <strong>{{ Auth::user()->name }}</strong> 🎉
            Sekarang kamu bisa menyimpan novel ke <strong>Favorite</strong>!
        </span>
    </div>
    @endauth
</div>

<!-- NOVEL LIST -->
<section class="product spad">
    <div class="container">
        <h4 class="mb-3">Novel Terbaru</h4>
        <div class="novel-grid">
            @foreach ($novels as $novel)
                <div class="novel-card">
                    <div class="novel-cover-wrap">
                        <span class="badge-up">UP</span>
                        <a href="{{ route('user.novel.show', $novel->id) }}">
                            <img src="{{ $novel->cover
                                ? asset('storage/'.$novel->cover)
                                : asset('users/img/no-cover.jpg') }}"
                                 alt="{{ $novel->title }}">
                        </a>
                    </div>
                    <div class="novel-name">{{ $novel->title }}</div>
                    <div     class="chapter-list">
                        @foreach ($novel->chapters->sortByDesc('created_at')->take(2) as $chapter)
                            <a href="{{ route('user.novel.read', [$novel->id, $chapter->id]) }}" class="chapter-row">
                                <span class="chapter-num">Chapter {{ $chapter->chapter_number }}</span>
                                <span class="chapter-time">{{ $chapter->created_at->diffForHumans() }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- JS -->
<script src="{{ asset('users/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('users/js/jquery-3.3.1.min.js') }}"></script>
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

    // Search expand on click
    const searchToggle = document.getElementById('searchToggle');
    const searchForm   = document.getElementById('searchForm');
    const searchInput  = document.getElementById('searchInput');
    let searchOpen = false;

    if (searchToggle && searchForm && searchInput) {
        searchToggle.addEventListener('click', function (e) {
            e.stopPropagation();
            searchOpen = !searchOpen;
            searchForm.style.width = searchOpen ? '210px' : '0';
            if (searchOpen) setTimeout(() => searchInput.focus(), 320);
        });

        document.addEventListener('click', function (e) {
            if (!searchForm.contains(e.target) && e.target !== searchToggle) {
                searchOpen = false;
                searchForm.style.width = '0';
            }
        });
    }
});
</script>

</body>
</html>