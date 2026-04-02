@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">

        <div class="d-flex justify-content-between mb-3">
            <h4>Data Novel</h4>
            <a href="{{ route('admin.novel.create') }}"
               class="btn btn-primary">
                + Tambah Novel
            </a>
        </div>

        {{-- ALERT --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- TABLE --}}
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th width="120">Cover</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Sinopsis</th>
                    <th width="220">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($novels as $novel)
                <tr>
                    {{-- COVER --}}
                    <td class="text-center">
                        @if($novel->cover)
                            <img src="{{ asset('storage/'.$novel->cover) }}"
                                 style="height:80px;border-radius:6px">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>

                    {{-- JUDUL --}}
                    <td>{{ $novel->title }}</td>

                    {{-- KATEGORI --}}
                    <td>
                        <span class="badge bg-info">
                            {{ $novel->category->name ?? '-' }}
                        </span>
                    </td>

                    {{-- SINOPSIS --}}
                    <td>
                        {{ \Illuminate\Support\Str::limit($novel->synopsis, 80) }}
                    </td>

                    {{-- AKSI --}}
                    <td>
                        <a href="{{ route('admin.novel.show', $novel->id) }}"
                           class="btn btn-info btn-sm">
                            Detail
                        </a>

                        <a href="{{ route('admin.novel.edit', $novel->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('admin.novel.destroy', $novel->id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus novel ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Data novel masih kosong
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection
