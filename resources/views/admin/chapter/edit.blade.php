@extends('layouts.admin')

@section('content')
<h4>Edit Chapter</h4>

<form action="{{ route('admin.chapter.update', $chapter->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Novel</label>
        <select name="novel_id" class="form-control" required>
            @foreach ($novels as $novel)
                <option value="{{ $novel->id }}"
                    {{ $chapter->novel_id == $novel->id ? 'selected' : '' }}>
                    {{ $novel->title }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Chapter Ke</label>
        <input type="number"
               name="chapter_number"
               value="{{ $chapter->chapter_number }}"
               class="form-control"
               required>
    </div>

    <div class="mb-3">
        <label>Judul Chapter</label>
        <input type="text"
               name="title"
               value="{{ $chapter->title }}"
               class="form-control"
               required>
    </div>

    <div class="mb-3">
        <label>Isi Chapter</label>
        <textarea name="content" rows="6"
                  class="form-control"
                  required>{{ $chapter->content }}</textarea>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.chapter.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
