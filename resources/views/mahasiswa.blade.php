@extends('admin.dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tabel Mahasiswa 👋</h1>
    </div>
    <form class="d-flex col-lg-3 mt-4" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>


    <div class="card mt-3">
        <div class="card-header">
            <h2>Daftar Mahasiswa</h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambahkan Mahasiswa
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="tambahMahasiswa" method="POST" action="/mahasiswa/tambah">
                                @csrf
                                <label for="nim" class="form-label">NIM</label>
                                <input class="form-control" type="number" inputmode="numeric" name="nim"
                                    id="nim">
                                <label for="nama" class="form-label">Nama</label>
                                <input class="form-control" type="text" name="nama" id="nama">
                                <label for="jurusan" class="form-label">Jurusann</label>
                                <input class="form-control" type="text" name="jurusan" id="jurusan">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" onclick="document.getElementById('tambahMahasiswa').submit()"
                                class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive small">
            @if (count($datas) > 0)
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->nim }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->jurusan }}</td>
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
