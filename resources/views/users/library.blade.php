@extends('layouts.app')

@section('title','Library')

@section('content')
<style>
    body { background:#0b0c10; color:#fff; }

    .library-tabs a {
        color:#aaa;
        font-weight:500;
        padding-bottom:8px;
        border-bottom:2px solid transparent;
    }
    .library-tabs a.active {
        color:#8b5cf6;
        border-color:#8b5cf6;
    }

    .novel-card img {
        border-radius:10px;
        height:240px;
        object-fit:cover;
    }

    .badge-update {
        position:absolute;
        top:8px;
        left:8px;
        background:red;
        font-size:11px;
        padding:3px 6px;
        border-radius:6px;
    }
</style>

<div class="container py-4">

    {{-- TAB --}}
    <div class="library-tabs d-flex gap-4 mb-4">
        <a href="{{ route('user.library','bookmark') }}"
           class="{{ $tab=='bookmark'?'active':'' }}">
            🔖 Bookmark
        </a>
        <a href="{{ route('user.library','readlist') }}"
           class="{{ $tab=='readlist'?'active':'' }}">
            📖 Readlist
        </a>
        <a href="{{ route('user.library','history') }}"
           class="{{ $tab=='history'?'active':'' }}">
            🕘 History
        </a>
    </div>

    {{-- CONTENT --}}
    {{-- CONTENT --}}
<div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-3">

    @if($tab == 'history')

        @forelse ($histories as $history)
            <div class="col">
                <div class="position-relative">

                    {{-- COVER --}}
                    <a href="{{ route('user.novel.read', [$history->novel_id, $history->chapter_id]) }}">
                        <img src="{{ asset('storage/'.$history->novel->cover) }}" class="img-fluid">
                    </a>

                    {{-- BADGE --}}
                    <span class="badge-update">
                        Ch {{ $history->chapter->chapter_number }}
                    </span>
                </div>

                {{-- TITLE --}}
                <small class="d-block mt-2 text-center">
                    {{ Str::limit($history->novel->title,30) }}
                </small>

                {{-- LANJUTKAN --}}
                <div class="text-center mt-1">
                    <a href="{{ route('user.novel.read', [$history->novel_id, $history->chapter_id]) }}"
                       class="btn btn-sm btn-primary">
                        Lanjut
                    </a>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted mt-5">
                Belum ada riwayat baca
            </div>
        @endforelse

    @else

        {{-- DEFAULT (bookmark / readlist) --}}
        @forelse ($novels as $novel)
            <div class="col">
                <div class="position-relative">
                    <a href="{{ route('user.novel.show',$novel->id) }}">
                        <img src="{{ asset('storage/'.$novel->cover) }}" class="img-fluid">
                    </a>
                    <span class="badge-update">UP</span>
                </div>
                <small class="d-block mt-2 text-center">
                    {{ Str::limit($novel->title,30) }}
                </small>
            </div>
        @empty
            <div class="col-12 text-center text-muted mt-5">
                Belum ada data di {{ ucfirst($tab) }}
            </div>
        @endforelse

    @endif

</div>
</div>
@endsection
