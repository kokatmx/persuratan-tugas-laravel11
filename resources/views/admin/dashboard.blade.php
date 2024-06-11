@extends('admin.dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hallo, selamat datang <strong> {{ Auth::user()->name }}</strong> 👋</h1>
    </div>
    <form class="d-flex col-lg-3 mt-4" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>


    <div class="card mt-3">
        <div class="card-header">
            <h2>Semua Surat</h2>
        </div>
        <div class="table-responsive small">
            @if (count($datas) > 0)
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">No Surat</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Surat</th>
                            <th scope="col">Status</th>
                            <th scope="col">File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->no_surat }}</td>
                                <td>{{ $data->mahasiswa->nim }}</td>
                                <td>{{ $data->mahasiswa->nama }}</td>
                                <td>{{ $data->jenis_surat }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <img src={{ asset('/storage/surat/' . $data->file_surat) }}
                                        alt="foto suratnya {{ $data->file_surat }}" style="max-width: 200px">
                                    <button data-bs-target="#tambahSuratSakit" data-bs-toggle="modal"
                                        class="btn btn-success">
                                        Lihat gambar
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="tambahSuratSakit" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src={{ asset('/storage/surat/' . $data->file_surat) }}
                                                        alt="foto suratnya {{ $data->file_surat }}"
                                                        style="max-width: 200px">
                                                    <p>diatas adalah foto suratnya</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Kembali</button>
                                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div>Tidak ada data</div>
            @endif
        </div>
    </div>
@endsection
