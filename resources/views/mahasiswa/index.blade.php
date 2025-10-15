@extends('Layout.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Mahasiswa</h2>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-success">+ Tambah Mahasiswa</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Aksi</th>
        </tr>
    </thead>
       <tbody>
    @foreach($mahasiswa as $m)
    <tr>
        <td>{{ $loop->iteration }}</td> <!-- ✅ nomor urut otomatis -->
        <td>{{ $m->nim }}</td>
        <td>{{ $m->nama }}</td>
        <td>{{ $m->prodi }}</td>
        <td>
            <a href="/mahasiswa/{{ $m->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
            <form action="/mahasiswa/{{ $m->id }}/delete" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection
