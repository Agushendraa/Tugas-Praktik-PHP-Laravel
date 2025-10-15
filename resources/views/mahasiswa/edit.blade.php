@extends('Layout.app')

@section('title', 'Edit Mahasiswa')

@section('content')
<h2>Edit Mahasiswa</h2>

@if ($errors->any())
<div class="alert alert-danger">
  <ul class="mb-0">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form action="{{ route('mahasiswa.update', $m->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label class="form-label">NIM</label>
    <input type="text" name="nim" class="form-control" value="{{ old('nim', $m->nim) }}">
  </div>
  <div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama', $m->nama) }}">
  </div>
  <div class="mb-3">
    <label class="form-label">Prodi</label>
    <input type="text" name="prodi" class="form-control" value="{{ old('prodi', $m->prodi) }}">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
  <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
