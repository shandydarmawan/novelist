@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Tambah Kategori</h3>

    <form action="{{ route('admin.category.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" name="name" class="form-control" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
