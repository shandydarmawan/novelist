<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <!-- Logo -->
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{ route('admin.novel.index') }}">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" />
        </a>
        <a class="sidebar-brand brand-logo-mini" href="{{ route('admin.novel.index') }}">
            <img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo mini" />
        </a>
    </div>

    <ul class="nav">

        <!-- ================= ADMIN ================= -->
        <li class="nav-item nav-category">
            <span class="nav-link">Admin</span>
        </li>

        <!-- Novel -->
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.novel.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-book-open-page-variant"></i>
                </span>
                <span class="menu-title">Novel</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.novel.create') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-plus-box"></i>
                </span>
                <span class="menu-title">Tambah Novel</span>
            </a>
        </li>

        <!-- ================= CHAPTER ================= -->
        <li class="nav-item nav-category">
            <span class="nav-link">Chapter</span>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.chapter.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-outline"></i>
                </span>
                <span class="menu-title">Daftar Chapter</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.chapter.create') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-plus-box-multiple"></i>
                </span>
                <span class="menu-title">Tambah Chapter</span>
            </a>
        </li>

        <!-- ================= AUTHOR ================= -->
        <li class="nav-item nav-category">
            <span class="nav-link">Author</span>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.author.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-account-edit"></i>
                </span>
                <span class="menu-title">Daftar Author</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.author.create') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-account-plus"></i>
                </span>
                <span class="menu-title">Tambah Author</span>
            </a>
        </li>

        <!-- ================= KATEGORI ================= -->
        <li class="nav-item nav-category">
            <span class="nav-link">Kategori</span>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.category.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-shape-outline"></i>
                </span>
                <span class="menu-title">Daftar Kategori</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.category.create') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-plus-box"></i>
                </span>
                <span class="menu-title">Tambah Kategori</span>
            </a>
        </li>
        <li class="nav-item nav-category">
    <span class="nav-link">User Activity</span>
</li>

<li class="nav-item menu-items">
    <a class="nav-link" href="{{ route('admin.history.index') }}">
        <span class="menu-icon">
            <i class="mdi mdi-history"></i>
        </span>
        <span class="menu-title">Reading History</span>
    </a>
</li>

    </ul>
</nav>
