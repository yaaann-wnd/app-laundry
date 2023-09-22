@extends('layouts.memberAsset')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show mb-3 d-flex align-items-center justify-content-between w-100 pe-1"
                                role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close position-static py-0" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                style="font-size: .8rem !important;">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <h4 class="text-primary">ZEA LAUNDRY</h4>
                            </div>
                            <h4>Halo, Selamat Datang!</h4>
                            <h6 class="font-weight-light">Silahkan login untuk melanjutkan!</h6>
                            <form class="pt-3" action="{{ route('loginProses') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg @error('nama_member') is-invalid @enderror" id="nama"
                                        placeholder="Masukkan Nama" name="nama_member">
                                    @error('nama_member')
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
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Member baru? <a href="/register" class="text-primary">Daftar</a>
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
