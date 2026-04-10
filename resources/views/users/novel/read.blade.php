@extends('layouts.app')

@section('title', $novel->title . ' - ' . $chapter->title)

@push('styles')
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
body { font-family: 'Inter', sans-serif; background: #0f0f0f; }

.reader-wrapper {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    padding: 40px 15px;
}

.reader {
    width: 100%;
    max-width: 900px;
    background: #1a1a1a;
    padding: 50px 55px;
    border-radius: 14px;
    box-shadow: 0 25px 60px rgba(0,0,0,.8);
}

.reader-header {
    text-align: center;
    margin-bottom: 40px;
}
.reader-header h2 { font-size: 1.8rem; font-weight: 700; color: #fff !important; }
.reader-header h4 { font-size: 1rem; color: #dddddd !important; opacity: .85; }

.reader-content {
    font-size: 17px;
    line-height: 1.95;
    text-align: justify;
    color: #ffffff !important;
}
.reader-content p { margin-bottom: 20px; }

.reader-nav {
    margin-top: 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}

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
    background: #2a2a2a;
    color: #fff !important;
    text-align: center;
    line-height: 36px;
    text-decoration: none;
    font-size: 13px;
    transition: all .3s;
}
.chapter-pagination a:hover { background: #7c4dff; }
.chapter-pagination .active { background: #7c4dff; font-weight: 700; }

.btn-nav {
    background: none;
    border: 1px solid #555;
    color: #fff !important;
    padding: 10px 18px;
    border-radius: 30px;
    text-decoration: none;
    transition: all .3s;
    white-space: nowrap;
}
.btn-nav:hover { background: #7c4dff; border-color: #7c4dff; }

/* ===== NAV MODERN ===== */
.chapter-nav-modern {
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 14px;
    background: rgba(20,20,20,0.9);
    padding: 12px 18px;
    border-radius: 40px;
    backdrop-filter: blur(10px);
    box-shadow: 0 10px 30px rgba(0,0,0,.6);
    z-index: 999;
}

.nav-circle {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: #2a2a2a;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 20px;
    text-decoration: none;
    transition: all .25s ease;
    cursor: pointer;
}

.nav-circle:hover {
    background: #7c4dff;
    transform: scale(1.1);
}

.nav-circle.disabled {
    opacity: .3;
    pointer-events: none;
}

/* ===== CHAPTER LIST ===== */
.chapter-list-box {
    position: fixed;
    bottom: 90px;
    left: 50%;
    transform: translateX(-50%);
    width: 260px;
    max-height: 300px;
    overflow-y: auto;
    background: #1a1a1a;
    border-radius: 12px;
    padding: 10px;
    display: none;
    box-shadow: 0 20px 40px rgba(0,0,0,.7);
    z-index: 999;
}

.chapter-list-box a {
    display: block;
    padding: 10px;
    color: #ccc;
    text-decoration: none;
    border-radius: 6px;
    font-size: 14px;
}

.chapter-list-box a:hover {
    background: #333;
}

.chapter-list-box a.active {
    background: #7c4dff;
    color: #fff;
    font-weight: bold;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
    .reader { padding: 25px 18px; border-radius: 10px; }
    .reader-header h2 { font-size: 1.3rem; }
    .reader-content { font-size: 15px; }

    .nav-circle {
        width: 42px;
        height: 42px;
        font-size: 16px;
    }

    .chapter-nav-modern {
        gap: 10px;
        padding: 10px 14px;
    }

    .chapter-list-box {
        width: 90%;
    }
}
</style>
@endpush

@section('content')

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

    </div>
</div>
<!-- NAVIGASI MODERN -->
<div id="chapterNav" class="chapter-nav-modern" style="opacity:0;pointer-events:none;transition:.3s;">

    @if ($prev)
    <a href="{{ route('user.novel.read', [$novel->id, $prev->id]) }}" class="nav-circle">‹</a>
    @else
    <div class="nav-circle disabled">‹</div>
    @endif

    <a href="{{ route('user.novel.show', $novel->id) }}" class="nav-circle">🏠</a>

    <div class="nav-circle" onclick="toggleChapterList()">☰</div>

    @if ($next)
    <a href="{{ route('user.novel.read', [$novel->id, $next->id]) }}" class="nav-circle">›</a>
    @else
    <div class="nav-circle disabled">›</div>
    @endif

</div>

<!-- LIST CHAPTER -->
<div id="chapterListBox" class="chapter-list-box">
    @foreach ($novel->chapters->sortBy('chapter_number') as $item)
        <a href="{{ route('user.novel.read', [$novel->id, $item->id]) }}"
           class="{{ $item->id === $chapter->id ? 'active' : '' }}">
            Chapter {{ $item->chapter_number }}
        </a>
    @endforeach
</div>


@endsection

@push('scripts')
<script>
function toggleChapterList() {
    const box = document.getElementById('chapterListBox');
    box.style.display = box.style.display === 'block' ? 'none' : 'block';
}

const nav = document.getElementById('chapterNav');

// 🔥 AUTO SHOW NAV SAAT SCROLL KE BAWAH (80%)
window.addEventListener('scroll', function () {
    const scrollTop = window.scrollY;
    const windowHeight = window.innerHeight;
    const docHeight = document.body.scrollHeight;

    if (scrollTop + windowHeight >= docHeight * 0.8) {
        nav.style.opacity = "1";
        nav.style.pointerEvents = "auto";
    } else {
        // Jika tidak di akhir, cek apakah sedang tap mode
        checkTapMode();
    }
});

// 🔥 TAP/CLICK UNTUK SHOW NAV DIMANA SAJA
let tapTimeout;
let isTapMode = false;

document.addEventListener('click', function(e) {
    // Ignore clicks on nav elements
    if (e.target.closest('.chapter-nav-modern') || e.target.closest('.chapter-list-box')) {
        return;
    }
    
    // Single tap detection
    clearTimeout(tapTimeout);
    tapTimeout = setTimeout(() => {
        showNavWithTimeout();
    }, 200);
});

document.addEventListener('touchend', function(e) {
    // Mobile touch support
    if (e.target.closest('.chapter-nav-modern') || e.target.closest('.chapter-list-box')) {
        return;
    }
    
    clearTimeout(tapTimeout);
    tapTimeout = setTimeout(() => {
        showNavWithTimeout();
    }, 200);
});

function showNavWithTimeout() {
    nav.style.opacity = "1";
    nav.style.pointerEvents = "auto";
    isTapMode = true;
    
    // Auto hide after 5 seconds
    setTimeout(() => {
        if (isTapMode) {
            nav.style.opacity = "0";
            nav.style.pointerEvents = "none";
            isTapMode = false;
        }
    }, 5000);
}

function checkTapMode() {
    if (!isTapMode) {
        nav.style.opacity = "0";
        nav.style.pointerEvents = "none";
    }
}

// 🔥 CLOSE LIST JIKA KLIK LUAR
document.addEventListener('click', function(e){
    const box = document.getElementById('chapterListBox');
    if (!e.target.closest('.chapter-list-box') && !e.target.closest('.nav-circle')) {
        box.style.display = 'none';
    }
});
</script>
@endpush

