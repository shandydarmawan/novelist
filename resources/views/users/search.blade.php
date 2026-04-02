@extends('layouts.app')

@section('title','Pencarian')

@section('content')
<div class="container py-4">
    <h5 class="mb-4">
        Hasil pencarian: <strong>"{{ request('q') }}"</strong>
    </h5>

    <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-3">
        @forelse ($novels as $novel)
            <div class="col">
                <a href="{{ route('user.novel.show',$novel->id) }}">
                    <img src="{{ asset('storage/'.$novel->cover) }}"
                         class="img-fluid rounded mb-1">
                </a>
                <small>{{ $novel->title }}</small>
            </div>
        @empty
            <p class="text-muted">Novel tidak ditemukan.</p>
        @endforelse
    </div>
</div>
@endsection
