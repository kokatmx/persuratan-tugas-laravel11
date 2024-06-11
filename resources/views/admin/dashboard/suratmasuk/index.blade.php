@extends('admin.dashboard.layouts.main')
@section('container')
    <div class="card">
        <div class="card-header">
            <h2>Manage Surat Masuk</h2>
        </div>
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
                <tr>
                    <td>1</td>
                    <td>sk/01</td>
                    <td>2231740034</td>
                    <td>Surat Sakit</td>
                    <td>Surat Sakit</td>
                    <td>Selesai</td>
                    <td>text.jpg</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>sk/02</td>
                    <td>2231740001</td>
                    <td>Surat Sakit</td>
                    <td>Surat Sakit</td>
                    <td>Selesai</td>
                    <td>text.jpg</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>sd/01</td>
                    <td>2231740021</td>
                    <td>Surat Disposisi</td>
                    <td>Surat Disposisi</td>
                    <td>Selesai</td>
                    <td>text.jpg</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>ss/01</td>
                    <td>2231740021</td>
                    <td>Surat Sakit</td>
                    <td>Surat Sakit</td>
                    <td>Selesai</td>
                    <td>text.jpg</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>sd/03</td>
                    <td>2231740021</td>
                    <td>Surat Disposisi</td>
                    <td>Surat Disposisi</td>
                    <td>Selesai</td>
                    <td>text.jpg</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>si/01</td>
                    <td>2231740021</td>
                    <td>Surat Ijin</td>
                    <td>Surat Disposisi</td>
                    <td>Selesai</td>
                    <td>text.jpg</td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection
