<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Novelist')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('users/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/elegant-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/style.css') }}">

       <style>
        body { background:#0b0c10; color:#fff; }

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
            color: #ddd;
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
<script src="{{ asset('users/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('users/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('users/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('users/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('users/js/main.js') }}"></script>

</body>
</html>
