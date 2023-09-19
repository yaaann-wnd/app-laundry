@extends('layouts.sidebar_member')

@section('content')
    <div class="promo">
        <div class="promo-wrapper">
            <img src="{{ asset('images/gambar-slider/1.jpg') }}" alt="">
            <div class="teks-promo-wrapper">
                <span class="judul">Pesan 2 kali, Gratis 3 kali!</span>
                <span class="desc">Tunggu apalagi, ayo buruan pesan di Zea Laundry. This is once in a lifetime promo!
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
                <span class="desc">Tunggu apalagi, ayo buruan pesan di Zea Laundry. This is once in a lifetime promo!
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
                <span class="desc">Tunggu apalagi, ayo buruan pesan di Zea Laundry. This is once in a lifetime promo!
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
                <span class="desc">Tunggu apalagi, ayo buruan pesan di Zea Laundry. This is once in a lifetime promo!
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
                <span class="desc">Tunggu apalagi, ayo buruan pesan di Zea Laundry. This is once in a lifetime promo!
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
                <span class="desc">Tunggu apalagi, ayo buruan pesan di Zea Laundry. This is once in a lifetime promo!
                </span>
                <div class="tombol-wrapper">
                    <button class="btn btn-primary">Pesan Sekarang</button>
                </div>
            </div>
        </div>
    </div>
    <div class="judul-produk text-center my-5">
        <h3>Pilih Paket</h3>
    </div>
    <div class="produk mb-5">
        @foreach ($paket as $pkt)
            <div class="card">
                <img src="{{ asset('images/gambar-slider/'. $foto .'.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body kartu ">
                    <div class="nama-jasa-wrapper">
                        <h5 class="card-title">{{ $pkt->jenis_jasa }}</h5>
                        <span class="text-primary">@rupiah($pkt->harga_perkg)</span>
                    </div>
                    <p class="card-text">Proses cuci menggunakan teknologi AI dan ditenagai Nvidia RTX 7090 sehingga membuat pakaian Anda menjadi sangat bersih.</p>
                    <div>
                        <a href="#" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
