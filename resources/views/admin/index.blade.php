@extends('layouts.admin')

@section('title', 'Admin - Novel')

@section('content')
<div class="card">
  <div class="card-body">

    <div class="d-flex justify-content-between mb-3">
        <h4>Data Novel</h4>
        <a href="{{ route('admin.novel.create') }}" class="btn btn-primary">
            + Tambah Novel
        </a>
    </div>

    <table class="table table-bordered">
        ...
    </table>

  </div>
</div>
@endsection
