@extends('layouts.admin')

@section('content')
<h4>Edit Author</h4>

<form action="{{ route('admin.author.update', $author->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama Author</label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name', $author->name) }}"
               required>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.author.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</form>
@endsection
