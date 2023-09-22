@extends('layouts.memberAsset')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('images/logo-dark.svg') }}" alt="logo">
                            </div>
                            <h4>Halo, Selamat Datang!</h4>
                            <h6 class="font-weight-light">Daftar dulu ya guys!</h6>
                            <form class="pt-3" action="{{ route('registerProses') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg @error('nama_member') is-invalid @enderror" id="nama"
                                        placeholder="Masukkan Nama" name="nama_member">
                                    @error('nama_member')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg @error('alamat_member') is-invalid @enderror" id="alamat"
                                        placeholder="Masukkan Alamat" name="alamat_member">
                                        @error('alamat_member')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg @error('no_telp_member') is-invalid @enderror" id="Masukkan Nomor Telepon"
                                        placeholder="Masukkan Nomor Telepon" name="no_telp_member">
                                        @error('no_telp_member')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="Masukkan Password"
                                        placeholder="Masukkan Password" name="password">
                                        @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">DAFTAR</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Sudah punya akun? <a href="{{ route('login') }}" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
