<nav class="navbar navbar-expand-lg p-0 m-0 z-1 sticky-lg-top shadow-sm ">
    <div class="container-fluid fs-6 p-0 m-0">
        <a href="" style="margin-left: 7%" class="d-flex justify-content-start">
            <img src="img/logo.png" alt="logo" width="100" class="align-middle">
            <a class="navbar-brand text-uppercase fst-italic" href="/"
                style="color:#0086fd;font-family:'Times New Roman', Times, serif;">POLITEKNIK NEGERI
                MALANG
                <br>
                PSDKU LUMAJANG</a>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse fs-6" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto text-capitalize m-0" style="gap: 50px; ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false" style="transition: all .3s linear;">
                        Arsip
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Sakit</a></li>
                        <li><a class="dropdown-item" href="">Ijin</a></li>
                    </ul>
                </li>
                <li class="nav-item" style="margin: 0 100px 0 0;">
                    <a href="/contact" class="nav-link">Contact US</a>
                </li>
            </ul>
            <ul class="d-flex p-0 m-0 text-uppercase" style="gap: 4px;font-size:1rem">
                @if (Route::has('login'))
                    <div class="d-flex">
                        @auth
                            <a href="{{ Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('dashboard') }}"class="btn btn-primary rounded-0 flex-fill"
                                style="padding: 25px; box-sizing: border-box;">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary rounded-0 flex-fill"
                                style="padding: 25px; box-sizing: border-box;">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-success rounded-0 flex-fill"
                                    style="padding: 25px; box-sizing: border-box;">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </ul>
        </div>
    </div>
</nav>
