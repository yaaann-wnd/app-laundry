@extends('layouts.sidebar_member')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card" style="padding: 10px 50px;">
    <div class="card" style="box-shadow: 5px 5px 5px 5px #c4c0c0;">
      <div class="card-body">
        <img src="{{ asset('images/faces/face5.jpg')}}" alt="profile" style="margin-bottom: 10px;float:right" />
        <h4 class="card-title">{{ Auth::user()->nama_member }}</h4>
        <p class="card-description">
          Profile Settings
        </p>
        <form class="forms-sample" action="{{ route('edit_profile_member') }}" method="POST" >
        @csrf
          <div class="form-group">
            <label for="exampleInputUsername1">Nama</label>
            <input type="hidden" class="form-control" id="id" name="id" value="{{ Auth::user()->id }}">
            <input type="text" class="form-control" id="nama" name="nama_member" value="{{ Auth::user()->nama_member }}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat_member" value="{{ Auth::user()->alamat_member }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nomer Telepon</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp_member" value="{{ Auth::user()->no_telp_member }}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password Baru</label>
            <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Edit Profile</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
