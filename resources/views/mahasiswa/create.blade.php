@extends('Layout.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
<h2>Tambah Mahasiswa</h2>

@if ($errors->any())
<div class="alert alert-danger">
  <ul class="mb-0">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form action="{{ route('mahasiswa.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label class="form-label">NIM</label>
    <input type="text" name="nim" class="form-control" value="{{ old('nim') }}">
  </div>
  <div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
  </div>
  <div class="mb-3">
    <label class="form-label">Prodi</label>
    <input type="text" name="prodi" class="form-control" value="{{ old('prodi') }}">
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
