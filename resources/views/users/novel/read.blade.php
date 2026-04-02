@extends('layouts.app')

@section('title', $novel->title . ' - ' . $chapter->title)

@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

body {
    font-family: 'Inter', sans-serif;
    background: #0f0f0f;
    color: #ffffff; /* teks utama putih terang */
}

/* ================= READER ================= */

.reader-wrapper {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    padding: 50px 15px;
}

.reader {
    width: 100%;
    max-width: 900px;
    background: #1a1a1a; /* sedikit lebih terang agar kontras dengan background */
    padding: 50px 55px;
    border-radius: 14px;
    box-shadow: 0 25px 60px rgba(0,0,0,.8);
}

/* ================= HEADER ================= */

.reader-header {
    text-align: center;
    margin-bottom: 40px;
}

.reader-header h2 {
    font-size: 1.8rem;
    font-weight: 700;
    color: #ffffff; /* judul putih terang */
}

.reader-header h4 {
    font-size: 1rem;
    opacity: .85; /* sedikit lebih terang */
    color: #dddddd;
}

/* ================= CONTENT ================= */

.reader-content {
    font-size: 17px;
    line-height: 1.95;
    text-align: justify;
    color: #ffffff; /* teks isi putih cerah */
}

.reader-content p {
    margin-bottom: 20px;
}

/* ================= NAV ================= */

.reader-nav {
    margin-top: 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* ================= PAGINATION ================= */

.chapter-pagination {
    display: flex;
    gap: 8px;
    justify-content: center;
    flex-wrap: wrap;
}

.chapter-pagination a {
    min-width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #2a2a2a; /* lebih gelap tapi tidak hitam total */
    color: #ffffff; /* teks pagination putih */
    text-align: center;
    line-height: 36px;
    text-decoration: none;
    font-size: 13px;
    transition: all .3s;
}

.chapter-pagination a:hover {
    background: #7c4dff;
    color: #ffffff;
}

.chapter-pagination .active {
    background: #7c4dff;
    color: #ffffff;
    font-weight: 700;
}

/* ================= BUTTON ================= */

.btn-nav {
    background: none;
    border: 1px solid #555; /* border lebih terang */
    color: #ffffff; /* teks tombol putih */
    padding: 10px 18px;
    border-radius: 30px;
    text-decoration: none;
    transition: all .3s;
}

.btn-nav:hover {
    background: #7c4dff;
    border-color: #7c4dff;
    color: #ffffff;
}

/* ================= RESPONSIVE ================= */

@media (max-width: 768px) {
    .reader {
        padding: 30px 25px;
    }

    .reader-content {
        font-size: 16px;
    }
}

</style>

<div class="reader-wrapper">

    <div class="reader">

        <!-- HEADER -->
        <div class="reader-header">
            <a href="{{ route('user.novel.show', $novel->id) }}"
               class="btn-nav mb-3 d-inline-block">
                ← Kembali ke Novel
            </a>

            <h2>{{ $novel->title }}</h2>
            <h4>Chapter {{ $chapter->chapter_number }} — {{ $chapter->title }}</h4>
        </div>

        <!-- CONTENT -->
        <div class="reader-content">
            {!! nl2br(e($chapter->content)) !!}
        </div>

        <!-- NAVIGATION -->
        <div class="reader-nav">

            <!-- PREV -->
            <div>
                @if ($prev)
                    <a href="{{ route('user.novel.read', [$novel->id, $prev->id]) }}"
                       class="btn-nav">
                        ← Sebelumnya
                    </a>
                @endif
            </div>

            <!-- PAGINATION NUMBER -->
            <div class="chapter-pagination">
                @foreach ($novel->chapters->sortBy('chapter_number') as $item)
                    <a href="{{ route('user.novel.read', [$novel->id, $item->id]) }}"
                       class="{{ $item->id === $chapter->id ? 'active' : '' }}">
                        {{ $item->chapter_number }}
                    </a>
                @endforeach
            </div>

            <!-- NEXT -->
            <div>
                @if ($next)
                    <a href="{{ route('user.novel.read', [$novel->id, $next->id]) }}"
                       class="btn-nav">
                        Selanjutnya →
                    </a>
                @endif
            </div>

        </div>

    </div>

</div>
@endsection
