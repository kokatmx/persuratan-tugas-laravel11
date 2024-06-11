@extends('admin.dashboard.layouts.main')
@section('container')
    <h1>Detail Surat</h1>
    <p>No Surat: {{ $surat->no_surat }}</p>
    <p>NIM: {{ $surat->nim }}</p>
    <p>Nama: {{ $surat->mahasiswa->nama }}</p>
    <p>Jenis Surat: {{ $surat->jenis_surat }}</p>
    <p>Status: {{ $surat->status }}</p>
    @if ($surat->file_surat)
        <p>File Surat: <a href="{{ asset('storage/' . $surat->file_surat) }}" target="_blank">Download</a></p>
    @endif
    <a href="{{ route('surats.index') }}">Kembali</a>
@endsection
