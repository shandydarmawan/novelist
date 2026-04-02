@extends('layouts.admin')

@section('content')
<h4>Daftar Chapter</h4>

<a href="{{ route('admin.chapter.create') }}" class="btn btn-primary">
    Tambah Chapter
</a>

<br><br>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>No</th>
            <th>Novel</th>
            <th>Chapter</th>
            <th>Judul</th>
            <th>Views</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($chapters as $chapter)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $chapter->novel->title }}</td>
            <td>{{ $chapter->chapter_number }}</td>
            <td>{{ $chapter->title }}</td>
            <td>{{ $chapter->views }}</td>
            <td>
                <a href="{{ route('admin.chapter.edit', $chapter->id) }}">Edit</a>

                <form action="{{ route('admin.chapter.destroy', $chapter->id) }}"
                      method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus chapter?')">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
