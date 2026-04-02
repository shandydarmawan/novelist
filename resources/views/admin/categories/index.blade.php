@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Daftar Kategori</h2>

    <a href="{{ route('admin.category.create') }}"
       class="btn btn-primary mb-3">
        + Tambah Kategori
    </a>

    @if(session('success'))
        <div class="alert alert-info">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th width="80">ID</th>
                <th>Nama</th>
                <th>Slug</th>
                <th width="120">Jumlah Novel</th>
                <th width="160">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td class="text-center">
                    <span class="badge bg-success">
                        {{ $category->novels_count }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.category.edit', $category->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.category.destroy', $category->id) }}"
                          method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                          onclick="return confirm('Hapus kategori ini?')">
                          Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
