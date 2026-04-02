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
    <link rel="stylesheet" href="{{ asset('users/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/style.css') }}">

    <style>
        body { 
            background:#0b0c10; 
            color:#f5f5f5; 
        }

        /* CERAHKAN SEMUA TEKS */
        h1,h2,h3,h4,h5,h6,
        .navbar-brand strong,
        .nav-link,
        .novel-title {
            color:#ffffff !important;
        }

        p, span, small, label {
            color:#e6e6e6 !important;
        }

        .text-muted {
            color:#d0d0d0 !important;
        }

        input::placeholder {
            color:#d0d0d0 !important;
        }

        /* ACCOUNT MENU */
        .account-menu {
            position: absolute;
            top: 48px;
            right: 0;
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

        /* NOVEL */
        .novel-card img {
            border-radius: 6px;
            height: 220px;
            object-fit: cover;
        }
        .novel-title {
            font-size: .85rem;
            margin-top: 6px;
            text-align: center;
        }

        .notice-login {
            display: flex;
            gap: 12px;
            background: #151515;
            border-left: 4px solid #7c4dff;
            padding: 14px 18px;
            border-radius: 8px;
            font-size: 14px;
            color: #f0f0f0;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<header class="header bg-dark sticky-top">
    <div class="container-fluid px-4">
        <nav class="navbar navbar-expand-lg navbar-dark">

            <a class="navbar-brand d-flex align-items-center gap-2"
               href="{{ route('user.home') }}">
                <img src="{{ asset('users/img/novelist.png') }}" height="36">
                <strong>Novelist</strong>
            </a>

            <form action="{{ route('user.search') }}"
                  method="GET"
                  class="mx-auto d-none d-lg-block"
                  style="width:380px;">
                <input type="text"
                       name="q"
                       class="form-control bg-dark text-white border-0"
                       placeholder="Cari Novel">
            </form>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

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
                        <a href="javascript:void(0)"
                           id="accountToggle"
                           class="nav-link">
                            <i class="fa fa-user-circle fs-5"></i>
                        </a>

                        <div id="accountMenu" class="account-menu">
                            <div class="account-name">
                                {{ Auth::user()->name }}
                            </div>

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
            </div>
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
    <div class="notice-login">
        <i class="fa fa-info-circle"></i>
        <span>
            Kamu bisa membaca novel tanpa login.
            Login hanya untuk <strong>Favorite</strong>.
        </span>
    </div>
</div>

<!-- NOVEL LIST -->
<section class="product spad">
    <div class="container">
        <h4 class="mb-3">Novel Terbaru</h4>

        <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-3">
            @foreach ($novels as $novel)
                <div class="col">
                    <div class="novel-card">
                        <a href="{{ route('user.novel.show', $novel->id) }}">
                            <img src="{{ $novel->cover
                                ? asset('storage/'.$novel->cover)
                                : asset('users/img/no-cover.jpg') }}"
                                 class="img-fluid">
                        </a>
                        <div class="novel-title">{{ $novel->title }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- JS -->
<script src="{{ asset('users/js/bootstrap.min.js') }}"></cript>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('accountToggle');
    const menu   = document.getElementById('accountMenu');
    if (!toggle || !menu) return;

    toggle.addEventListener('click', function (e) {
        e.stopPropagation();
        menu.classList.toggle('show');
    });

    document.addEventListener('click', function () {
        menu.classList.remove('show');
    });
});
</script>

</body>
</html>
