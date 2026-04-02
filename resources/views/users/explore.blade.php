@extends('layouts.app')

@section('title', 'Novelist | Explore')

@section('content')

<style>
    body {
        background: #0b0c10;
        color: #fff;
    }

    .novel-card img {
        border-radius: 6px;
        height: 220px;
        object-fit: cover;
    }

    .novel-title {
        font-size: 0.85rem;
        margin-top: 6px;
        text-align: center;
    }

    .section-title h4 {
        color: #fff;
        font-weight: 600;
    }
</style>

<!-- CONTENT -->
<section class="product spad">
    <div class="container">
        <div class="section-title mb-4">
            <h4>Novel Terbaru Di-Update</h4>
        </div>

        <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-3">
            @forelse ($novels as $novel)
                <div class="col">
                    <div class="novel-card">
                        <a href="{{ route('user.novel.show', $novel->id) }}">
                            <img
                                src="{{ $novel->cover
                                    ? asset('storage/' . $novel->cover)
                                    : asset('users/img/no-cover.jpg') }}"
                                class="img-fluid"
                                alt="{{ $novel->title }}"
                            >
                        </a>
                        <div class="novel-title">
                            {{ $novel->title }}
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada novel.</p>
            @endforelse
        </div>
    </div>
</section>

@endsection
