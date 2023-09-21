<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('navbar-assets/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('navbar-assets/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('navbar-assets/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('navbar-assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick/slick.css') }}" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/slick/slick-theme.css') }}" /> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick/style-home.css') }}" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
        #map {
            height: 100%;
        }
    </style>
    <title>ZEA LAUNDRY</title>
</head>

<body style="background-color: #0056b324;">
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

        <div class="px-5">
            <div class="row align-items-center position-relative">


                <div class="site-logo">
                    <a href="#" class="text-primary">ZEA LAUNDRY</a>
                </div>

                <div class="col-12">
                    <nav class="site-navigation text-right ml-auto " role="navigation">

                        <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                            <li><a href="/" class="nav-link">Beranda</a></li>
                            <li><a href="{{ route('transaksi') }}" class="nav-link">Pesanan Saya</a></li>
                            <li><a href="#about-section" class="nav-link">Tentang Kami</a></li>
                            <li><a href="#testimonials-section" class="nav-link">Testimoni</a></li>
                            <li>
                                <div>
                                    <a href="{{ route('login') }}">
                                        <button class="btn btn-outline-primary">Masuk</button>
                                    </a>
                                    <a href="{{ route('register') }}">
                                        <button class="btn btn-primary">Daftar</button>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="toggle-button d-inline-block d-lg-none"><a href="#"
                        class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
                </div>
            </div>
        </div>
    </header>

    <div class="isi">
        <div class="promo">
            <div class="promo-wrapper">
                <img src="{{ asset('images/gambar-slider/1.jpg') }}" alt="">
                <div class="teks-promo-wrapper">
                    <span class="judul">Pesan 2 kali, Gratis 3 kali!</span>
                    <span class="desc">Tunggu apalagi, ayo buruan pesan di Zea Laundry. This is once in a lifetime
                        promo!
                    </span>
                    <div class="tombol-wrapper">
                        <button class="btn btn-primary">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
            <div class="promo-wrapper">
                <img src="{{ asset('images/gambar-slider/2.jpg') }}" alt="">
                <div class="teks-promo-wrapper">
                    <span class="judul">Pesan 2 kali, Gratis 3 kali!</span>
                    <span class="desc">Tunggu apalagi, ayo buruan pesan di Zea Laundry. This is once in a lifetime
                        promo!
                    </span>
                    <div class="tombol-wrapper">
                        <button class="btn btn-primary">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
            <div class="promo-wrapper">
                <img src="{{ asset('images/gambar-slider/3.jpg') }}" alt="">
                <div class="teks-promo-wrapper">
                    <span class="judul">Pesan 2 kali, Gratis 3 kali!</span>
                    <span class="desc">Tunggu apalagi, ayo buruan pesan di Zea Laundry. This is once in a lifetime
                        promo!
                    </span>
                    <div class="tombol-wrapper">
                        <button class="btn btn-primary">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
            <div class="promo-wrapper">
                <img src="{{ asset('images/gambar-slider/1.jpg') }}" alt="">
                <div class="teks-promo-wrapper">
                    <span class="judul">Pesan 2 kali, Gratis 3 kali!</span>
                    <span class="desc">Tunggu apalagi, ayo buruan pesan di Zea Laundry. This is once in a lifetime
                        promo!
                    </span>
                    <div class="tombol-wrapper">
                        <button class="btn btn-primary">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
            <div class="promo-wrapper">
                <img src="{{ asset('images/gambar-slider/2.jpg') }}" alt="">
                <div class="teks-promo-wrapper">
                    <span class="judul">Pesan 2 kali, Gratis 3 kali!</span>
                    <span class="desc">Tunggu apalagi, ayo buruan pesan di Zea Laundry. This is once in a lifetime
                        promo!
                    </span>
                    <div class="tombol-wrapper">
                        <button class="btn btn-primary">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
            <div class="promo-wrapper">
                <img src="{{ asset('images/gambar-slider/3.jpg') }}" alt="">
                <div class="teks-promo-wrapper">
                    <span class="judul">Pesan 2 kali, Gratis 3 kali!</span>
                    <span class="desc">Tunggu apalagi, ayo buruan pesan di Zea Laundry. This is once in a lifetime
                        promo!
                    </span>
                    <div class="tombol-wrapper">
                        <button class="btn btn-primary">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="judul-produk text-center my-md-5 my-3">
            <h3>Pilih Paket</h3>
        </div>
        <div class="produk mb-5">
            @foreach ($paket as $pkt)
                <div class="card">
                    <img src="{{ asset('images/gambar-slider/' . $foto . '.jpg') }}" class="card-img-top"
                        alt="...">
                    <div class="card-body kartu ">
                        <div class="nama-jasa-wrapper">
                            <h5 class="card-title">{{ $pkt->jenis_jasa }}</h5>
                            <span class="text-primary">@rupiah($pkt->harga_perkg)</span>
                        </div>
                        <p class="card-text">Proses cuci menggunakan teknologi AI dan ditenagai Nvidia RTX 7090
                            sehingga membuat
                            pakaian Anda menjadi sangat bersih.</p>
                        <div>
                            <a href="{{ route('login') }}">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#pesan{{ $pkt->id }}">Pesan</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="copyright">
        <span><strong>&copy; ZEA LAUNDRY 2023. All Rights Reserved.</strong></span>
        <span>Made With ❤️ by <strong>Aftiyan & Timo</strong></span>
    </div>

    <script src="{{ asset('navbar-assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('navbar-assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('navbar-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('navbar-assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('navbar-assets/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/slick/slick.js') }}"></script>

    <script>
        $('.promo').slick({
            accesibility: false,
            arrows: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    </script>
</body>

</html>
