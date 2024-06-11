@extends('admin.dashboard.layouts.main')
@section('container')
    <div class="container-xl">
        <div class="card">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Surat Disposisi</h2>
                            </div>
                        </div>
                    </div>
                    <!-- Tabel untuk menampilkan daftar surat disposisi -->
                    @if (count($datas) > 0)
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">No Surat</th>
                                    <th scope="col" class="text-center">NIM</th>
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">File</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Looping untuk menampilkan data surat disposisi -->
                                @foreach ($datas as $index => $data)
                                    <tr class="text-center">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $data->no_surat }}</td>
                                        <td>{{ $data->mahasiswa->nim }}</td>
                                        <td>{{ $data->mahasiswa->nama }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->file_surat }}</td>
                                        <td class="d-flex justify-content-between align-items-center">
                                            <!-- Tombol untuk menghapus surat -->
                                            <form action="{{ route('surats.delete', $data->id) }}" method="POST"
                                                class="row ms-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                            <button data-bs-toggle="modal"
                                                data-bs-target="#editSuratDisposisi{{ $data->id }}"
                                                class="btn btn-primary m-1 ">Edit</button>
                                            <div class="modal
                                                fade"
                                                id="editSuratDisposisi{{ $data->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Surat
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Form untuk menambahkan surat baru -->
                                                            <form id="editSurat{{ $data->id }}" method="POST"
                                                                enctype="multipart/form-data"
                                                                action="{{ route('surats.update', $data->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <label for='no_surat' class='form-label'>No Surat</label>
                                                                <input value="{{ $data->no_surat }}" class='form-control'
                                                                    type='text' name='no_surat' id='no_surat'>
                                                                <label for='nim' class='form-label'>NIM</label>
                                                                <input value="{{ $data->mahasiswa->nim }}"
                                                                    class='form-control' type='number' inputmode="numeric"
                                                                    name='nim' id='nim'>
                                                                <div>
                                                                    <label for="jenis_surat">Jenis Surat:</label>
                                                                    <select name="jenis_surat" id="jenis_surat" required>
                                                                        @foreach (['izin', 'sakit', 'disposisi'] as $option)
                                                                            <option
                                                                                {{ $option == $data->jenis_surat ? 'selected' : '' }}
                                                                                value="{{ $option }}">
                                                                                {{ ucfirst($option) }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>

                                                                <div>
                                                                    <label for="status">Status:</label>
                                                                    <select name="status" id="status" required>
                                                                        @foreach (['diproses', 'ditolak', 'diterima'] as $option)
                                                                            <option
                                                                                {{ $data->status == $option ? 'selected' : '' }}
                                                                                value="{{ $option }}">
                                                                                {{ ucfirst($option) }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>


                                                                <label for='file' class='form-label'>File</label>
                                                                <input class='form-control' accept="image/*" type='file'
                                                                    name='file' id='file'>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="button"
                                                                onclick="document.getElementById('editSurat{{ $data->id }}').submit()"
                                                                class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ route('surats.show', $data->id) }}"
                                                class="btn btn-success">Lihat</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Data Surat Kosong</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
