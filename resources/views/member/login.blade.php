@extends('layouts.memberAsset')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                    style="font-size: .8rem !important;">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="brand-logo">
                                <img src="{{ asset('images/logo-dark.svg') }}" alt="logo">
                            </div>
                            <h4>Halo, Selamat Datang!</h4>
                            <h6 class="font-weight-light">Silahkan login untuk melanjutkan!</h6>
                            <form class="pt-3" action="{{ route('loginProses') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="nama"
                                        placeholder="Masukkan Nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="Masukkan Password"
                                        placeholder="Masukkan Password" name="password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Member baru? <a href="/" class="text-primary">Daftar</a>
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