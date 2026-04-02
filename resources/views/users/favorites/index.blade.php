@extends('layouts.app')

@section('title', 'Favorite Saya')

@section('content')

<style>
body {
    background: #0e0e0e;
    color: #fff;
}
.favorite-card img {
    height: 220px;
    object-fit: cover;
    border-radius: 8px;
}
.favorite-title {
    font-size: 14px;
    margin-top: 8px;
    text-align: center;
}
</style>

<div class="container py-5">

    <h3 class="mb-4">❤️ Novel Favorite Saya</h3>

    @if ($favorites->isEmpty())
        <p class="text-muted">Belum ada novel favorit.</p>
    @else
        <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-4">
            @foreach ($favorites as $favorite)
                <div class="col">
                    <div class="favorite-card">
                        <a href="{{ route('user.novel.show', $favorite->novel->id) }}">
                            <img
                                src="{{ $favorite->novel->cover
                                    ? asset('storage/' . $favorite->novel->cover)
                                    : asset('users/img/no-cover.jpg') }}"
                                class="img-fluid"
                                alt="{{ $favorite->novel->title }}"
                            >
                        </a>

                        <div class="favorite-title">
                            {{ $favorite->novel->title }}
                        </div>

                        <form
                            action="{{ route('favorite.toggle', $favorite->novel->id) }}"
                            method="POST"
                            class="text-center mt-2"
                        >
                            @csrf
                            <button class="btn btn-sm btn-outline-danger">
                                Hapus Favorite
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="mt-4">
        <a href="{{ route('user.home') }}" class="btn btn-secondary btn-sm">
            ← Kembali ke Home
        </a>
    </div>

</div>

@endsection
