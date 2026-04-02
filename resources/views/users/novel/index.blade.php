@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<h3 class="mb-4">📖 Daftar Novel</h3>

<div class="row">
    @foreach($novels as $novel)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">

                    <h5>{{ $novel->title }}</h5>

                    <p class="text-muted">
                        {{ Str::limit($novel->synopsis, 100) }}
                    </p>

                    <p>
                        <small>
                            ✍ {{ $novel->author->name ?? '-' }} |
                            📂 {{ $novel->category->name ?? '-' }}
                        </small>
                    </p>

                    {{-- ✅ FIX ROUTE (TANPA UBAH TEMPLATE) --}}
                    <a href="{{ route('user.novel.show', $novel->id) }}"
                       class="btn btn-primary btn-sm">
                        Baca Novel
                    </a>

                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
