@extends('layouts.sidebar')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Register Kasir</h4>
                    <p class="card-description">
                        Basic form elements
                    </p>
                    <form class="forms-sample" action="{{ route('simpan_kasir') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Nomer Telepon</label>
                            <input type="text" class="form-control" name="no_telp" id="no_telp"
                                placeholder="Nomer Telepon">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Username</label>
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password">
                        </div>
                        <button type="submit" id="simpan_kasir" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Nomer Telepon</th>
                                    <th>Jabatan</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $p)
                                    <tr>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->alamat }}</td>
                                        <td>{{ $p->no_telp }}</td>
                                        <td>{{ $p->jabatan }}</td>
                                        <td>{{ $p->username }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
