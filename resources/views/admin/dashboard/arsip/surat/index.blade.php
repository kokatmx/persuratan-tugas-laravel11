@extends('admin.dashboard.layouts.main')
@section('container')
    <h1>Arsip Surat</h1>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <a href="{{ route('surats.create') }}">Tambah Surat</a>
    <table>
        <thead>
            <tr>
                <th>No Surat</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Surat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($surats as $surat)
                <tr>
                    <td>{{ $surat->no_surat }}</td>
                    <td>{{ $surat->nim }}</td>
                    <td>{{ $surat->mahasiswa->nama }}</td>
                    <td>{{ $surat->jenis_surat }}</td>
                    <td>{{ $surat->status }}</td>
                    <td>
                        <a href="{{ route('surats.show', $surat->id) }}">Lihat</a>
                        <a href="{{ route('surats.edit', $surat->id) }}">Edit</a>
                        <form action="{{ route('surats.destroy', $surat->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
