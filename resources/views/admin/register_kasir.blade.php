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
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Name">
                        @error('nama')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Alamat">
                        @error('alamat')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Nomer Telepon</label>
                        <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" id="no_telp" placeholder="Nomer Telepon">
                        @error('no_telp')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username">
                        @error('username')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                        @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
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
                                <th>Action</th>
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
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete{{ $p->id }}">Delete</button>
                                    <div class="modal fade" id="modaldelete{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('delete_user_kasir') }}" method="post">
                                                @csrf
                                                    <div class="modal-body" style="text-align: center;">
                                                        <input type="hidden" name="id" value="{{ $p->id }}">
                                                        <p class="display-4">Apakah Anda Yakin</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Ya</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
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