@extends('admin.dashboard.layouts.main')
@section('container')
    <div class="container text-center mt-5">
        <div class="row align-items-start">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Surat Izin</h5>
                        <p class="card-text">Berisi Surat Izin Mahasiswa</p>
                        <a href="{{ Auth::user()->usertype == 'admin' ? route('admin.dashboard.arsip.suratizin.index') : route('dashboard') }}"
                            class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Surat Disposisi</h5>
                        <p class="card-text">Berisi Surat Disposisi Mahasiswa</p>
                        <a href="{{ Auth::user()->usertype == 'admin' ? route('admin.dashboard.arsip.suratdisposisi.index') : route('dashboard') }}"
                            class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Surat Sakit</h5>
                        <p class="card-text">Berisi Surat Sakit Mahasiswa.</p>
                        <a href="{{ Auth::user()->usertype == 'admin' ? route('admin.dashboard.arsip.suratsakit.index') : route('dashboard') }}"
                            class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>

            <button data-bs-target="#tambahSuratSakit" data-bs-toggle="modal" class="btn btn-success mt-5 text-center">
                <i class="material-icons">&#xE147;</i> <span class="text-center">Tambah Surat</span>
            </button>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="modal fade" id="tambahSuratSakit" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Surat</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form untuk menambahkan surat baru -->
                            <form id="tambahSurat" method="POST" enctype="multipart/form-data"
                                action="{{ route('surats.create') }}">
                                @csrf
                                <label for='no_surat' class='form-label'>No Surat</label>
                                <input class='form-control' type='text' name='no_surat' id='no_surat'>
                                <label for='nim' class='form-label'>NIM</label>
                                <input class='form-control' type='number' inputmode="numeric" name='nim'
                                    id='nim'>
                                <div>
                                    <label for="jenis_surat">Jenis Surat:</label>
                                    <select name="jenis_surat" id="jenis_surat" required>
                                        @foreach (['izin', 'sakit', 'disposisi'] as $option)
                                            <option value="{{ $option }}">{{ ucfirst($option) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="status">Status:</label>
                                    <select name="status" id="status" required>
                                        @foreach (['diproses', 'ditolak', 'diterima'] as $option)
                                            <option value="{{ $option }}">{{ ucfirst($option) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <label for='file' class='form-label'>File</label>
                                <input class='form-control' accept="image/*" type='file' name='file' id='file'>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" onclick="document.getElementById('tambahSurat').submit()"
                                class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
