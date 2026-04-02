<nav class="navbar p-0 fixed-top d-flex flex-row">
    {{-- Logo (mobile) --}}
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="{{ route('admin.novel.index') }}">
            📚
        </a>
    </div>

    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">

        {{-- Toggle Sidebar --}}
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>

        {{-- Search --}}
        <ul class="navbar-nav w-100">
            <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                    <input type="text"
                           class="form-control"
                           placeholder="Cari novel, judul, penulis...">
                </form>
            </li>
        </ul>

        {{-- Right Menu --}}
        <ul class="navbar-nav navbar-nav-right">

            {{-- Admin Name --}}
            <li class="nav-item d-none d-lg-block">
                <span class="nav-link text-light">
                    👤 Admin Novelist
                </span>
            </li>

            {{-- Logout (optional) --}}
            <li class="nav-item">
                <a class="nav-link" href="#" title="Logout">
                    <i class="mdi mdi-logout text-danger"></i>
                </a>
            </li>

            {{-- Offcanvas --}}
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
                    type="button" data-toggle="offcanvas">
                <span class="mdi mdi-format-line-spacing"></span>
            </button>
        </ul>

    </div>
</nav>
