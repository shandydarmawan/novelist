@extends('layouts.admin')

@section('content')
<h4>Tambah Chapter</h4>

<form action="{{ route('admin.chapter.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Novel</label>
        <select name="novel_id" class="form-control" required>
            <option value="">-- Pilih Novel --</option>
            @foreach ($novels as $novel)
                <option value="{{ $novel->id }}">
                    {{ $novel->title }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Chapter Ke</label>
        <input type="number" name="chapter_number" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Judul Chapter</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Isi Chapter</label>
        <textarea name="content" rows="6" class="form-control" required></textarea>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.chapter.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
