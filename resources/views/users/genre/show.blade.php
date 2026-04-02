@extends('layouts.app')

@section('title', 'Genre '.$category->name)

@section('content')
<div class="container py-4">

    {{-- GENRE HORIZONTAL --}}
    <div class="genre-scroll mb-4">
        @foreach ($categories as $cat)
            <a href="{{ route('genre.show', $cat->slug) }}"
               class="genre-item {{ $cat->id == $category->id ? 'active' : '' }}">
                {{ strtoupper($cat->name) }}
            </a>
        @endforeach
    </div>

    {{-- HEADER --}}
    <div class="mb-4">
        <h5 class="text-light fw-semibold mb-1">
            {{ strtoupper($category->name) }}
        </h5>

        <small class="text-muted">
            {{ $novels->count() }} serial
        </small>

        <div>
            <a href="{{ route('genre.index') }}"
               class="btn btn-outline-light btn-sm mt-2">
                ← Kembali
            </a>
        </div>
    </div>

    {{-- LIST NOVEL --}}
    <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-4">
        @forelse ($novels as $novel)
            <div class="col">
                <div class="card bg-dark text-light h-100 border-0">

                    <a href="{{ route('user.novel.show', $novel->id) }}">
                        <img src="{{ $novel->cover
                            ? asset('storage/'.$novel->cover)
                            : asset('users/img/no-cover.jpg') }}"
                             class="card-img-top novel-img">
                    </a>

                    <div class="card-body text-center p-2">
                        <h6 class="novel-card-title">
                            {{ $novel->title }}
                        </h6>
                    </div>

                </div>
            </div>
        @empty
            <p class="text-muted">Belum ada novel di genre ini.</p>
        @endforelse
    </div>

</div>

{{-- CSS --}}
<style>

/* ===== GENRE MENU ===== */
.genre-scroll {
    display: flex;
    overflow-x: auto;
    gap: 25px;
    padding-bottom: 10px;
    border-bottom: 1px solid #444;
}

.genre-scroll::-webkit-scrollbar {
    display: none;
}

.genre-item {
    text-decoration: none;
    color: #aaa;
    font-weight: 500;
    font-size: 14px;
    white-space: nowrap;
    position: relative;
    transition: 0.3s;
}

.genre-item:hover {
    color: #fff;
}

.genre-item.active {
    color: #fff;
}

/* underline */
.genre-item::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: -10px;
    width: 0%;
    height: 2px;
    background: #fff;
    transition: 0.3s;
}

.genre-item:hover::after,
.genre-item.active::after {
    width: 100%;
}


/* ===== NOVEL CARD ===== */
.novel-img {
    height: 220px;
    object-fit: cover;
}

.novel-card-title {
    color: #f1f1f1;
    font-size: 13px;
    margin-top: 6px;
}

/* Responsive */
@media (max-width: 576px) {
    .genre-item {
        font-size: 13px;
    }

    .novel-img {
        height: 180px;
    }
}

</style>
@endsection