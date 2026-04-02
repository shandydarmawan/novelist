@extends('layouts.admin')

@section('content')
<h4>Tambah Author</h4>

<form action="{{ route('admin.author.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nama Author</label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name') }}"
               required>
    </div>

    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.author.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</form>
@endsection
