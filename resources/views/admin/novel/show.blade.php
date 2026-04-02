@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Edit Novel</h4>

        <form action="{{ route('admin.novel.update', $novel->id) }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title"
                       value="{{ $novel->title }}"
                       class="form-control" required>
            </div>

            {{-- AUTHOR --}}
            <div class="mb-3">
                <label>Author</label>
                <select name="author_id" class="form-control" required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}"
                            @selected($novel->author_id == $author->id)>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- KATEGORI --}}
            <div class="mb-3">
                <label>Kategori</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            @selected($novel->category_id == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- STATUS --}}
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="ongoing" @selected($novel->status=='ongoing')>Ongoing</option>
                    <option value="completed" @selected($novel->status=='completed')>Completed</option>
                    <option value="hiatus" @selected($novel->status=='hiatus')>Hiatus</option>
                </select>
            </div>

            {{-- COVER --}}
            <div class="mb-3">
                <label>Cover</label><br>
                @if($novel->cover)
                    <img src="{{ asset('storage/'.$novel->cover) }}"
                         height="80" class="mb-2">
                @endif
                <input type="file" name="cover" class="form-control">
            </div>

            {{-- SINOPSIS --}}
            <div class="mb-3">
                <label>Sinopsis</label>
                <textarea name="synopsis" class="form-control" rows="4">{{ $novel->synopsis }}</textarea>
            </div>

            {{-- CONTENT --}}
            <div class="mb-3">
                <label>Konten</label>
                <textarea name="content" class="form-control" rows="6">{{ $novel->content }}</textarea>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.novel.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
