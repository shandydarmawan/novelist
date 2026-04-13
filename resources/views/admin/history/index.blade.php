@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Reading History User</h4>

        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Novel</th>
                        <th>Chapter</th>
                        <th>Terakhir Dibaca</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($histories as $h)
                    <tr>
                        <td>{{ $h->user->name ?? '-' }}</td>
                        <td>{{ $h->novel->title ?? '-' }}</td>
                        <td>{{ $h->chapter->title ?? '-' }}</td>
                        <td>{{ $h->updated_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $histories->links() }}
    </div>
</div>
@endsection