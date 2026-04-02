@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Edit Kategori</h2>

    <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-success">Update</button>
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
