@extends('layouts.app')

@section('title', 'Genre')

@section('content')
<div class="container py-4">

    {{-- JUDUL + BACK --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="text-light fw-semibold mb-0">Genre</h5>

        <a href="{{ url('/') }}" class="btn btn-outline-light btn-sm">
            ← Home
        </a>
    </div>

    {{-- GENRE HORIZONTAL --}}
    <div class="genre-scroll mb-4">
        @forelse ($categories as $category)
            <a href="{{ route('genre.show', $category->slug) }}"
               class="genre-item {{ request()->segment(2) == $category->slug ? 'active' : '' }}">
                {{ strtoupper($category->name) }}
            </a>
        @empty
            <span class="text-muted">Genre belum tersedia.</span>
        @endforelse
    </div>

</div>

{{-- CSS --}}
<style>
/* Container scroll */
.genre-scroll {
    display: flex;
    overflow-x: auto;
    gap: 25px;
    padding-bottom: 10px;
    border-bottom: 1px solid #444;
}

/* Hilangkan scrollbar */
.genre-scroll::-webkit-scrollbar {
    display: none;
}

/* Item genre */
.genre-item {
    text-decoration: none;
    color: #aaa;
    font-weight: 500;
    font-size: 14px;
    white-space: nowrap;
    position: relative;
    transition: 0.3s;
}

/* Hover */
.genre-item:hover {
    color: #fff;
}

/* Active */
.genre-item.active {
    color: #fff;
}

/* Underline effect */
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

/* Hover underline */
.genre-item:hover::after {
    width: 100%;
}

/* Active underline */
.genre-item.active::after {
    width: 100%;
}

/* Responsive */
@media (max-width: 576px) {
    .genre-item {
        font-size: 13px;
    }
}
</style>
@endsection