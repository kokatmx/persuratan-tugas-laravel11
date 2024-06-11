@extends('admin.dashboard.layouts.main')
@section('container')
    <h1>Tambah Surat</h1>
    <form action="{{ route('surats.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="no_surat">No Surat:</label>
        <input type="text" name="no_surat" id="no_surat" required>
        <label for="nim">NIM:</label>
        <select name="nim" id="nim" required>
            @foreach ($mahasiswas as $mahasiswa)
                <option value="{{ $mahasiswa->nim }}">{{ $mahasiswa->nama }} ({{ $mahasiswa->nim }})</option>
            @endforeach
        </select>
        <label for="jenis_surat">Jenis Surat:</label>
        <select name="jenis_surat" id="jenis_surat" required>
            <option value="izin">Izin</option>
            <option value="sakit">Sakit</option>
            <option value="disposisi">Disposisi</option>
        </select>
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="diproses">Diproses</option>
            <option value="diterima">Diterima</option>
            <option value="ditolak">Ditolak</option>
        </select>
        <label for="file_surat">File Surat:</label>
        <input type="file" name="file_surat" id="file_surat">
        <button type="submit">Tambah</button>
    </form>
@endsection
