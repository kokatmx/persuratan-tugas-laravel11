@extends('admin.dashboard.layouts.main')
@section('container')
    <div class="col-sm-6 mb-4">
        <h2>Analisis Surat</h2>
        <p>Rekap Surat Perbulan</p>
    </div>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Banyak Surat</th>
                <th scope="col">Surat Masuk</th>
                <th scope="col">Surat Keluar</th>
                <th scope="col">Bulan</th>
                <th scope="col">Tahun</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>26</td>
                <td>12</td>
                <td>14</td>
                <td>Maret</td>
                <td>2023</td>
            </tr>
            <tr>
                <td>2</td>
                <td>12</td>
                <td>3</td>
                <td>9</td>
                <td>April</td>
                <td>2023</td>
            </tr>
            <tr>
                <td>3</td>
                <td>19</td>
                <td>12</td>
                <td>7</td>
                <td>Mei</td>
                <td>2023</td>
            </tr>
        </tbody>
    </table>
@endsection
