@extends('admin.dashboard.layouts.main')
@section('container')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Surat Disposisi</h1>
        <form action="{{ route('surats.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="no_surat" class="form-label">No Surat:</label>
                <input type="text" name="no_surat" id="no_surat" class="form-control" value="{{ $surat->no_surat }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $surat->nama }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM:</label>
                <select name="nim" id="nim" class="form-control" required>
                    @foreach ($mahasiswas as $mahasiswa)
                        <option value="{{ $mahasiswa->nim }}" {{ $mahasiswa->nim == $surat->nim ? 'selected' : '' }}>
                            {{ $mahasiswa->nama }} ({{ $mahasiswa->nim }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="diproses" {{ $surat->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="diterima" {{ $surat->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="ditolak" {{ $surat->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File Surat:</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
