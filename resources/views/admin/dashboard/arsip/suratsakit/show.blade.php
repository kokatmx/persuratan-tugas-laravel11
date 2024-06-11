@extends('admin.dashboard.layouts.main')
@section('container')
    <div class="container mt-5">
        <h1 class="mb-4">Detail Surat Disposisi</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">No Surat: {{ $surat->no_surat }}</h5>
                <p class="card-text">Nama: {{ $surat->nama }}</p>
                <p class="card-text">NIM: {{ $surat->nim }}</p>
                <p class="card-text">Jenis Surat: {{ $surat->jenis_surat }}</p>
                <p class="card-text">Status: {{ $surat->status }}</p>
                @if ($surat->file_surat)
                    <p class="card-text">File Surat: <a href="{{ asset('storage/surat/' . $surat->file_surat) }}"
                            target="_blank">Lihat</a></p>
                @endif
                <a href="{{ route('admin.dashboard.arsip.suratsakit.index') }}" class="btn btn-primary">Kembali</a>
                {{-- <a href="{{ route('admin.dashboard.arsip.suratsakit.edit', $surat->id) }}" class="btn btn-warning">Edit</a> --}}
            </div>
        </div>
    </div>
@endsection
