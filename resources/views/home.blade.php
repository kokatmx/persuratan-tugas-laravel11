@extends('layouts.main')
@section('isinya')
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/kampus.jpg" class="d-block modal-fullscreen" alt="kampus">
                <div class="carousel-caption  ">
                    <h5>D-III <span class="fst-italic">Teknologi Informasi</span></h5>
                    <p class="text-capitalize">sistem informasi <br> manajemen surat <br> kemahasiswaan <br> (SIMAKER)</p>
                    {{-- <button type="button" class="btn button-dashboard bg-primary"><a href="/dashboard"
                            class="text-white text-decoration-none text-center">Dashboard <i
                                class="bi bi-chevron-right"></i></a></button> --}}
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/kampus.jpg" class="d-block modal-fullscreen" alt="kampus">
                <div class="carousel-caption  ">
                    <h5>D-III <span class="fst-italic">Teknologi Informasi</span></h5>
                    <p class="text-capitalize">sistem informasi <br> manajemen surat <br> kemahasiswaan <br> (SIMAKER)</p>
                    <p>ini yang kedua</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/kampus.jpg" class="d-block modal-fullscreen" alt="kampus">
                <div class="carousel-caption  ">
                    <h5>D-III <span class="fst-italic">Teknologi Informasi</span></h5>
                    <p class="text-capitalize">sistem informasi <br> manajemen surat <br> kemahasiswaan <br> (SIMAKER)</p>
                    <p>ini yang yang ketiga</p>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            {{-- <span class="visually-hidden">Previous</span> --}}
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            {{-- <span class="visually-hidden">Next</span> --}}
        </button>
    </div>
    <div class="container-fluid text-center">
        <div class="row text-white text-center" style="font-family: 'Times New Roman', Times, serif; line-height:24px">
            <div class="col p-4 colnya" style="background: #0086fd;">
                <a href="" class="text-decoration-none">
                    <p>Manajemen</p>
                    <p>Surat Masuk</p>
                </a>
            </div>
            <div class="col p-4 colnya" style="background: #007879;">
                <a href="" class="text-decoration-none">
                    <p>Analisis</p>
                    <p>Laporan</p>
                </a>
            </div>
            <div class="col p-4 colnya" style="background: #1e1c31; ">
                <a href="" class="text-decoration-none">
                    <p>Manajemen</p>
                    <p>Surat Keluar</p>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="text-center status-disposisi">Status Disposisi</h2>
        <div class="row mt-5 justify-content-around ">
            <div class="col-md-3 mb-3 mt-3">
                <div class="card" style="width: 18rem;">
                    <img src="img/logo.png" class="card-img-top" alt="..." width="100">
                    <div class="card-body">
                        <a href="" class="text-decoration-none">
                            <p class="card-text fs-4 text-capitalize text-black lh-lg">Proses</p>
                        </a>
                        <p class="card-text">Permohonan Penambahan Fasilitas Laboratorium dari Bagian Penelitian dan
                            Pengemabangan</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 mt-3">
                <div class="card" style="width: 18rem;">
                    <img src="img/logo.png" class="card-img-top" alt="..." width="100">
                    <div class="card-body">
                        <a href="" class="text-decoration-none">
                            <p class="card-text fs-4 text-capitalize text-black lh-lg">Selesai</p>
                        </a>
                        <p class="card-text">Permohonan Penambahan Fasilitas Laboratorium dari Bagian Penelitian dan
                            Pengemabangan</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 mt-3">
                <div class="card" style="width: 18rem;">
                    <img src="img/logo.png" class="card-img-top" alt="..." width="100">
                    <div class="card-body">
                        <a href="" class="text-decoration-none text-black">
                            <p class="card-text fs-4 text-capitalize lh-lg">Proses</p>
                        </a>
                        <p class="card-text">Permohonan Penambahan Fasilitas Laboratorium dari Bagian Penelitian dan
                            Pengemabangan</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3 mt-3">
                <div class="card" style="width: 18rem;">
                    <img src="img/logo.png" class="card-img-top" alt="..." width="100">
                    <div class="card-body">
                        <a href="" class="text-decoration-none text-black">
                            <p class="card-text fs-4 text-capitalize lh-lg">Selesai</p>
                        </a>
                        <p class="card-text">Permohonan Penambahan Fasilitas Laboratorium dari Bagian Penelitian dan
                            Pengemabangan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center" style="margin-bottom: 80px; gap:8px;">
        <a href="" class="text-decoration-none btn-viewall">
            <button type="button" class="btn  btn-outline-primary text-capitalize text-center" style="margin:45px 0">
                view all
            </button></a>
    </div>
    @include('footer')


    {{-- <div class="card text-bg-dark">
        <img src="img/kampus.jpg" class="card-img" alt="kampus" height="100%">
        <div class="card-img-overlay">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.
                This content is a little bit longer.</p>
            <p class="card-text"><small>Last updated 3 mins ago</small></p>
        </div>
    </div> --}}
@endsection
