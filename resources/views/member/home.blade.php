@extends('layouts.sidebar')

@section('content')
    <div class="card p-3 mb-2">
        <span>Selamat Datang, <strong>{{ Auth::user()->nama }}</strong></span>
    </div>
    <div class="card p-3">
        <div class="mb-3 text-center">
            <h4>Promo Cuy</h4>
        </div>
        <div class="promo">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('images/gambar-slider/1.jpg') }}" alt=""
                            style="height: 60vh; object-fit: cover;">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/gambar-slider/2.jpg') }}" alt=""
                            style="height: 60vh; object-fit: cover;">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/gambar-slider/3.jpg') }}" alt=""
                            style="height: 60vh; object-fit: cover;">
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            {{-- <div class="card">
                <img src="{{ asset('images/gambar-slider/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary" id="mangan">Go somewhere</a>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/gambar-slider/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/gambar-slider/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/gambar-slider/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card">
                <img src="{{ asset('images/gambar-slider/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
