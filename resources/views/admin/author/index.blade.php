@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Daftar Author</h1>

    <a href="{{ route('admin.author.create') }}" class="btn btn-primary">
        Tambah Author
    </a>

    <br><br>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Author</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($authors as $author)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $author->name }}</td>
                    <td>
                        <a href="{{ route('admin.author.edit', $author->id) }}">
                            Edit
                        </a>

                        <form action="{{ route('admin.author.destroy', $author->id) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Yakin hapus?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Data author kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
