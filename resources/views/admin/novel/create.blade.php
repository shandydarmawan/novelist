@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Tambah Novel</h4>

        <form action="{{ route('admin.novel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            {{-- AUTHOR --}}
            <div class="mb-3">
                <label>Author</label>
                <select name="author_id" class="form-control" required>
                    <option value="">-- Pilih Author --</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}">
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- KATEGORI --}}
            <div class="mb-3">
                <label>Kategori</label>
                <select name="category_id" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- STATUS --}}
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                    <option value="hiatus">Hiatus</option>
                </select>
            </div>

            {{-- COVER --}}
            <div class="mb-3">
                <label>Cover</label>
                <input type="file" name="cover" class="form-control">
            </div>

            {{-- SINOPSIS --}}
            <div class="mb-3">
                <label>Sinopsis</label>
                <textarea name="synopsis" class="form-control" rows="4"></textarea>
            </div>

            {{-- CONTENT --}}
            <div class="mb-3">
                <label>Konten (opsional)</label>
                <textarea name="content" class="form-control" rows="6"></textarea>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.novel.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
