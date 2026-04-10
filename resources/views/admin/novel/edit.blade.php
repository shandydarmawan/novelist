@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Edit Novel</h4>

        <form action="{{ route('admin.novel.update', $novel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" value="{{ $novel->title }}" required>
            </div>

            {{-- AUTHOR --}}
            <div class="mb-3">
                <label>Author</label>
                <select name="author_id" class="form-control" required>
                    <option value="">-- Pilih Author --</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}"
                            {{ $novel->author_id == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- KATEGORI UTAMA --}}
            <div class="mb-3">
                <label>Kategori</label>
                <select name="category_id" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $novel->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- 🔥 MULTI GENRE --}}
            <div class="mb-3">
                <label>Genre Tambahan</label><br>

                @foreach($categories as $category)
                    <label>
                        <input type="checkbox" name="category_ids[]" value="{{ $category->id }}"
                            {{ $novel->categories->contains($category->id) ? 'checked' : '' }}>
                        {{ $category->name }}
                    </label><br>
                @endforeach
            </div>

            {{-- STATUS --}}
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="ongoing" {{ $novel->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="completed" {{ $novel->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="hiatus" {{ $novel->status == 'hiatus' ? 'selected' : '' }}>Hiatus</option>
                </select>
            </div>

            {{-- COVER --}}
            <div class="mb-3">
                <label>Cover</label>
                <input type="file" name="cover" class="form-control">

                @if($novel->cover)
                    <img src="{{ asset('storage/' . $novel->cover) }}" width="100" class="mt-2">
                @endif
            </div>

            {{-- SINOPSIS --}}
            <div class="mb-3">
                <label>Sinopsis</label>
                <textarea name="synopsis" class="form-control" rows="4">{{ $novel->synopsis }}</textarea>
            </div>

            {{-- CONTENT --}}
            <div class="mb-3">
                <label>Konten (opsional)</label>
                <textarea name="content" class="form-control" rows="6">{{ $novel->content }}</textarea>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.novel.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection