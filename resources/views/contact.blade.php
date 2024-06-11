@extends('layouts.main')
@section('isinya')
    <div class=" pt-5 pb-5">
        <div class="container bg-white border border-1 p-5 shadow-sm"
            style="margin: 0 auto; width: 700px; border-radius: 14px;">
            <h1>Hubungi Kami</h1>
            <p>Universitas selalu senang mendengar dari Anda. Silahkan isi formulir ini untuk pertanyaan, komentar, atau
                saran.
            </p>

            <form action="/send-message" method="post">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama"
                        placeholder="Masukkan nama lengkap Anda">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Masukkan alamat email Anda">
                </div>

                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="3" placeholder="Masukkan pesan Anda"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>
        </div>
    </div>

    @include('footer')
@endsection
