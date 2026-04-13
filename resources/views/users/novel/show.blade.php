@extends('layouts.app')

@section('title', $novel->title)

@push('styles')
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
body { font-family: 'Inter', sans-serif; }

/* ================= HERO ================= */
.novel-hero {
    position: relative;
    width: 100%;
    min-height: 70vh;
    background: url('{{ asset('storage/' . $novel->cover) }}') center/cover no-repeat;
    display: flex;
    align-items: center;
    padding: 60px 20px;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to right, rgba(0,0,0,0.92) 30%, rgba(0,0,0,0.6) 60%, rgba(0,0,0,0.25));
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
    flex-wrap: wrap;
}

.hero-cover img {
    width: 180px;
    border-radius: 14px;
    box-shadow: 0 30px 60px rgba(0,0,0,.85);
}

.hero-info h1 {
    font-size: 2.2rem;
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

.novel-meta span {
    background: rgba(30,30,30,.8);
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 13px;
    margin-right: 6px;
    margin-bottom: 6px;
    display: inline-block;
    color: #fff;
}

.hero-actions {
    margin-top: 24px;
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

.btn-baca {
    background: #7c4dff;
    padding: 12px 30px;
    font-weight: 600;
    border-radius: 6px;
    color: #fff !important;
    text-decoration: none;
}
.btn-baca:hover { background: #5a32c2; }

/* 🔥 FAVORITE BUTTON KEREN 🔥 */
.btn-favorite {
    background: rgba(255,255,255,0.1);
    border: 2px solid rgba(255,255,255,0.3);
    color: #fff !important;
    padding: 12px 24px;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
    cursor: pointer;
}

.btn-favorite:hover {
    border-color: #ff6b6b;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(255,107,107,0.3);
}

.btn-favorite.favorited {
    background: linear-gradient(135deg, #ff6b6b 0%, #ff8e8e 100%);
    border-color: #ff6b6b;
    color: #fff !important;
    box-shadow: 0 8px 20px rgba(255,107,107,0.4);
    animation: pulse-fav 1.5s infinite;
}

@keyframes pulse-fav {
    0%, 100% { box-shadow: 0 8px 20px rgba(255,107,107,0.4); }
    50% { box-shadow: 0 8px 30px rgba(255,107,107,0.6); }
}

.btn-favorite.favorited:hover {
    background: linear-gradient(135deg, #ff5252 0%, #ff6b6b 100%);
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 15px 35px rgba(255,107,107,0.5);
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
.chapter-list a { color: #ddd; text-decoration: none; }
.chapter-list a:hover { color: #7c4dff; }

/* ================= REVIEW ================= */
.review-section { background: #111; padding: 60px 20px; }
.review-container { max-width: 900px; margin: auto; color: #fff; }
.review-form {
    background: #1a1a1a;
    padding: 20px;
    border-radius: 12px;
}
.review-form textarea, .review-form select {
    background: #0e0e0e;
    border: 1px solid #333;
    color: #fff;
}
.review-form textarea:focus, .review-form select:focus {
    border-color: #7c4dff;
    box-shadow: none;
}
.review-item {
    display: flex;
    gap: 15px;
    padding: 15px 0;
    border-bottom: 1px solid #2a2a2a;
}
.review-avatar img { width: 45px; height: 45px; border-radius: 50%; }
.review-content { flex: 1; }
.review-user { color: #fff; font-size: 14px; }
.review-stars { color: orange; font-size: 13px; }
.review-text { color: #ccc; font-size: 14px; margin: 6px 0; }
.review-footer { display: flex; justify-content: space-between; font-size: 12px; color: #888; }
.review-actions { display: flex; gap: 12px; cursor: pointer; align-items: center; }

/* ================= RESPONSIVE ================= */
@media (max-width: 768px) {
    .novel-hero { padding: 30px 16px; min-height: auto; }
    .hero-content { gap: 20px; }
    .hero-cover img { width: 120px; }
    .hero-info h1 { font-size: 1.4rem; }
    .hero-synopsis { font-size: 13px; }
    .chapter-section { padding: 30px 16px; }
}
/* 🔥 READLIST BUTTON */
.btn-readlist {
    background: rgba(255,255,255,0.1);
    border: 2px solid rgba(255,255,255,0.3);
    color: #fff !important;
    padding: 12px 24px;
    border-radius: 25px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

.btn-readlist:hover {
    border-color: #facc15;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(250,204,21,0.3);
}

.btn-readlist.active {
    background: linear-gradient(135deg, #facc15, #eab308);
    border-color: #facc15;
    color: #000 !important;
    box-shadow: 0 8px 20px rgba(250,204,21,0.4);
}
.btn-readlist.active {
    animation: pulse-read 1.5s infinite;
}

@keyframes pulse-read {
    0%, 100% { box-shadow: 0 8px 20px rgba(250,204,21,0.4); }
    50% { box-shadow: 0 8px 30px rgba(250,204,21,0.6); }
}
</style>
@endpush

@section('content') 
<!-- HERO -->
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
                @if($novel->categories->count())
                    @foreach($novel->categories as $cat)
                        <span>{{ $cat->name }}</span>
                    @endforeach
                @else
                    <span>{{ $novel->category->name ?? 'Unknown Genre' }}</span>
                @endif
                <span>Author: {{ $novel->author->name ?? '-' }}</span>
            </div>
            <div class="hero-actions">
                <a href="{{ route('user.novel.read', $novel->id) }}" class="btn-baca">▶ Baca</a>
                @auth<form action="{{ route('readlist.toggle', $novel->id) }}" method="POST" style="display:inline;">
                @csrf
<button class="btn-readlist {{ auth()->user()->readlists?->contains('novel_id', $novel->id) ? 'active' : '' }}">
    {{ auth()->user()->readlists?->contains('novel_id', $novel->id) 
        ? '📚 In Readlist' 
        : '📖 Readlist' }}
</button>
                 </form>
                @endauth

                @auth
                <form action="{{ route('favorite.toggle', $novel->id) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn-favorite {{ Auth::user()->favorites->contains($novel->id) ? 'favorited' : '' }}">
                        {{ Auth::user()->favorites->contains($novel->id) ? '❤️ Favorited' : '❤️ Favorite' }}
                    </button>
                </form>
                @else
                <a href="{{ route('login') }}" class="btn-favorite">❤️ Favorite</a>
                @endauth

                <a href="{{ route('user.home') }}" class="btn btn-outline-light">← Kembali</a>
            </div>
        </div>
    </div>
</section>

<!-- CHAPTER -->
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

<!-- REVIEW -->
<section class="review-section">
    <div class="review-container">
        <h4 class="mb-4">Ulasan & Rating</h4>

        @auth
        <form action="{{ route('review.store') }}" method="POST" class="review-form">
            @csrf
            <input type="hidden" name="novel_id" value="{{ $novel->id }}">
            <div class="mb-3">
                <label>Rating:</label>
                <select name="rating" class="form-select">
                    <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                    <option value="4">⭐⭐⭐⭐ (4)</option>
                    <option value="3">⭐⭐⭐ (3)</option>
                    <option value="2">⭐⭐ (2)</option>
                    <option value="1">⭐ (1)</option>
                </select>
            </div>
            <textarea name="comment" class="form-control mb-3" rows="3"
                      placeholder="Tulis ulasan kamu..."></textarea>
            <button class="btn btn-primary btn-sm">Kirim Ulasan</button>
        </form>
        @else
            <p class="text-muted">Silakan <a href="{{ route('login') }}">login</a> untuk memberi ulasan.</p>
        @endauth

        <div class="review-list mt-4">
            @forelse ($novel->reviews->where('is_manual', true) as $review)
            <div class="review-item">
                <div class="review-avatar">
                    <img src="https://ui-avatars.com/api/?name={{ $review->user->name }}&background=7c4dff&color=fff">
                </div>
                <div class="review-content">
                    <div class="review-top">
                        <strong class="review-user">{{ $review->user->name }}</strong>
                        <div class="review-stars">{{ str_repeat('⭐', $review->rating) }}</div>
                    </div>
                    <p class="review-text">{{ $review->comment }}</p>
                    <div class="review-footer">
                        <span>{{ $review->created_at->diffForHumans() }}</span>
                        <div class="review-actions">
                            👍 <span>0</span>
                            <form action="{{ route('review.delete', $review->id) }}" method="POST"
                                  onsubmit="return confirm('Hapus ulasan ini?')" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:none;border:none;color:red;cursor:pointer;font-size:14px;">🗑</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <p class="text-muted">Belum ada ulasan.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection