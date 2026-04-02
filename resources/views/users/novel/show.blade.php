@extends('layouts.app')

@section('title', $novel->title)

@section('content')

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

body {
    font-family: 'Inter', sans-serif;
    background: #0e0e0e;
    margin: 0;
}

/* ================= HERO ================= */
.novel-hero {
    position: relative;
    width: 100%;
    min-height: 100vh;
    background: url('{{ asset('storage/' . $novel->cover) }}') center/cover no-repeat;
    display: flex;
    align-items: center;
    padding: 60px;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        to right,
        rgba(0,0,0,0.92) 30%,
        rgba(0,0,0,0.6) 60%,
        rgba(0,0,0,0.25)
    );
    backdrop-filter: blur(6px);
    z-index: 1;
}

.hero-content {
    position: relative;
    z-index: 2;
    display: flex;
    gap: 40px;
    max-width: 1400px;
    width: 100%;
    align-items: center;
}

/* ================= COVER ================= */
.hero-cover img {
    width: 240px;
    border-radius: 14px;
    box-shadow: 0 30px 60px rgba(0,0,0,.85);
}

/* ================= INFO ================= */
.hero-info h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 12px;
    color: #fff;
}

.hero-synopsis {
    max-width: 720px;
    font-size: 15px;
    line-height: 1.7;
    color: #d1d1d1;
    margin-bottom: 20px;
}

/* ================= META ================= */
.novel-meta span {
    background: rgba(30,30,30,.8);
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 13px;
    margin-right: 6px;
    color: #fff;
}

/* ================= ACTION ================= */
.hero-actions {
    margin-top: 24px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.btn-baca {
    background: #7c4dff;
    padding: 12px 30px;
    font-weight: 600;
    border-radius: 6px;
    color: #fff;
    text-decoration: none;
}

.btn-baca:hover {
    background: #5a32c2;
}

/* ================= FAVORITE ================= */
.btn-favorite {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: rgba(30,30,30,.85);
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #aaa;
    font-size: 18px;
    transition: all .3s;
}

.btn-favorite.active {
    background: #ff3b5c;
    color: #fff;
}

.btn-favorite:hover {
    transform: scale(1.05);
}

/* ================= CHAPTER ================= */
.chapter-section {
    max-width: 1100px;
    margin: 0 auto;
    padding: 50px 20px;
    color: #fff;
}

.chapter-list li {
    border-bottom: 1px solid #2a2a2a;
    padding: 14px 0;
}

.chapter-list a {
    color: #ddd;
    text-decoration: none;
}

.chapter-list a:hover {
    color: #7c4dff;
}

/* ================= REVIEW ================= */
.review-section {
    background: #111;
    padding: 60px 20px;
}

.review-container {
    max-width: 900px;
    margin: auto;
    color: #fff;
}

/* FORM */
.review-form {
    background: #1a1a1a;
    padding: 20px;
    border-radius: 12px;
}

.review-form textarea,
.review-form select {
    background: #0e0e0e;
    border: 1px solid #333;
    color: #fff;
}

.review-form textarea:focus,
.review-form select:focus {
    border-color: #7c4dff;
    box-shadow: none;
}

/* CARD */
.review-card {
    background: #1a1a1a;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 12px;
    transition: 0.3s;
}

.review-card:hover {
    transform: translateY(-3px);
    background: #202020;
}

/* HEADER */
.review-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 6px;
}

/* RATING */
.review-rating {
    color: gold;
}

/* COMMENT */
.review-comment {
    color: #ccc;
    font-size: 14px;
}
/* ===== REVIEW STYLE UPGRADE ===== */
.review-item {
    display: flex;
    gap: 15px;
    padding: 15px 0;
    border-bottom: 1px solid #2a2a2a;
}

.review-avatar img {
    width: 45px;
    height: 45px;
    border-radius: 50%;
}

.review-content {
    flex: 1;
}

/* USER */
.review-user {
    color: #fff;
    font-size: 14px;
}

/* STARS */
.review-stars {
    color: orange;
    font-size: 13px;
}

/* TEXT */
.review-text {
    color: #ccc;
    font-size: 14px;
    margin: 6px 0;
}

/* FOOTER */
.review-footer {
    display: flex;
    justify-content: space-between;
    font-size: 12px;
    color: #888;
}

.review-actions {
    display: flex;
    gap: 12px;
    cursor: pointer;
}

.review-actions span {
    margin-left: 4px;
}
</style>

<!-- ================= HERO ================= -->
<section class="novel-hero">
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <div class="hero-cover">
            <img src="{{ asset('storage/' . $novel->cover) }}">
        </div>

        <div class="hero-info">
            <h1>{{ $novel->title }}</h1>

            <p class="hero-synopsis">{{ $novel->synopsis }}</p>

            <div class="novel-meta mb-3">
                <span>{{ $novel->category->name ?? 'Unknown Genre' }}</span>
                <span>Author: {{ $novel->author->name ?? '-' }}</span>
            </div>

            <div class="hero-actions">
                <a href="{{ route('user.novel.read', $novel->id) }}" class="btn-baca">
                    ▶ Baca
                </a>

                {{-- FAVORITE (AMAN TANPA LOGIN ROUTE) --}}
               @auth
<form action="{{ route('favorite.toggle', $novel->id) }}" method="POST">
    @csrf
    <button class="btn btn-outline-light">
        ❤️ Favorite 
    </button>
</form>
@else
<a href="{{ route('login') }}" class="btn btn-outline-light">
    ❤️ Favorite
</a>
@endauth


                <a href="{{ route('user.home') }}" class="btn btn-outline-light">
                    ← Kembali
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ================= CHAPTER ================= -->
<section class="chapter-section">
    <h4>Daftar Chapter</h4>

    <ul class="list-unstyled chapter-list">
        @foreach ($novel->chapters->sortBy('chapter_number') as $chapter)
            <li>
                <a href="{{ route('user.novel.read', [$novel->id, $chapter->id]) }}">
                    Chapter {{ $chapter->chapter_number }} — {{ $chapter->title }}
                </a>
            </li>
        @endforeach
    </ul>
</section>
<!-- ================= REVIEW ================= -->
<section class="review-section">

    <div class="review-container">
        <h4 class="mb-4">Ulasan & Rating</h4>

        {{-- FORM --}}
        @auth
        <form action="{{ route('review.store') }}" method="POST" class="review-form">
            @csrf

            <input type="hidden" name="novel_id" value="{{ $novel->id }}">

            <div class="rating-box mb-3">
                <label>Rating:</label>
                <select name="rating" class="form-select">
                    <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                    <option value="4">⭐⭐⭐⭐ (4)</option>
                    <option value="3">⭐⭐⭐ (3)</option>
                    <option value="2">⭐⭐ (2)</option>
                    <option value="1">⭐ (1)</option>
                </select>
            </div>

            <textarea name="comment"
                      class="form-control mb-3"
                      rows="3"
                      placeholder="Tulis ulasan kamu..."></textarea>

            <button class="btn btn-primary btn-sm">
                Kirim Ulasan
            </button>
        </form>
        @else
            <p class="text-muted">
                Silakan <a href="{{ route('login') }}">login</a> untuk memberi ulasan.
            </p>
        @endauth

        {{-- LIST REVIEW --}}
       <div class="review-list mt-4">

@forelse ($novel->reviews->where('is_manual', true) as $review)        <div class="review-item">

            {{-- AVATAR --}}
            <div class="review-avatar">
                <img src="https://ui-avatars.com/api/?name={{ $review->user->name }}&background=7c4dff&color=fff">
            </div>

            {{-- CONTENT --}}
            <div class="review-content">

                {{-- HEADER --}}
                <div class="review-top">
                    <div>
                        <strong class="review-user">
                            {{ $review->user->name }}
                        </strong>

                        <div class="review-stars">
                            {{ str_repeat('⭐', $review->rating) }}
                        </div>
                    </div>
                </div>

                {{-- COMMENT --}}
                <p class="review-text">
                    {{ $review->comment }}
                </p>

                {{-- FOOTER --}}
                <div class="review-footer">
                    <span class="review-time">
                        {{ $review->created_at->diffForHumans() }}
                    </span>

                    <div class="review-actions">

    👍 <span>0</span>
    💬

    {{-- TOMBOL HAPUS --}}
    <form action="{{ route('review.delete', $review->id) }}" method="POST"
          onsubmit="return confirm('Hapus ulasan ini?')">
        @csrf
        @method('DELETE')
        <button style="background:none;border:none;color:red;cursor:pointer;">
            🗑
        </button>
    </form>

</div>
                </div>

            </div>
        </div>
    @empty
        <p class="text-muted">Belum ada ulasan.</p>
    @endforelse

</div>

</section>

@endsection
