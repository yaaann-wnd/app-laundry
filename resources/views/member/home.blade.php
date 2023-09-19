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
                <img src="{{ asset('images/gambar-slider/' . $foto . '.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body kartu ">
                    <div class="nama-jasa-wrapper">
                        <h5 class="card-title">{{ $pkt->jenis_jasa }}</h5>
                        <span class="text-primary">@rupiah($pkt->harga_perkg)</span>
                    </div>
                    <p class="card-text">Proses cuci menggunakan teknologi AI dan ditenagai Nvidia RTX 7090 sehingga membuat
                        pakaian Anda menjadi sangat bersih.</p>
                    <div>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#pesan{{ $pkt->id }}">Pesan</button>
                    </div>
                </div>
            </div>

            {{-- MODAL PESAN PAKET --}}
            <div class="modal fade" id="pesan{{ $pkt->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Order</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Nama</label>
                                            <input type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Alamat</label>
                                            <input type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Nomer Telepon</label>
                                            <input type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Jasa</label>
                                            <select name="jasa" class="form-control" id="jasa">
                                                @foreach ($paket as $p)
                                                    <option value="{{ $p->id }}" {{ $p->id == $pkt->id ? 'selected' : '' }}>{{ $p->jenis_jasa }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Harga Per KG</label>
                                            <input type="text" readonly id="harga_perkg" class="form-control"
                                                value="{{ $pkt->harga_perkg }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">KG Order</label>
                                            <input type="text" id="kg_order" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Total Harga</label>
                                            <input type="text" id="total_harga" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Metode Pembayaran</label>
                                            <input type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Pembayaran ( Nominal )</label>
                                            <input type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Status Pembayaran</label>
                                            <input type="text" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Lokasi</label>
                                    <div id="map" style="height: 100%;"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
