@extends('layouts.sidebar_kurir')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <img src="{{ asset('images/faces/face5.jpg')}}" alt="profile" style="margin-bottom: 10px;float:right" />
        <h4 class="card-title"></h4>
        <p class="card-description">
          Profile Settings
        </p>
        <form class="forms-sample">
          <div class="form-group">
            <label for="exampleInputUsername1">Nama</label>
            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nomer Telepon</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputConfirmPassword1">Username</label>
            <input type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password Lama</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password Baru</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Edit Profile</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $.ajaxSetup({

    headers: {

      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

  });

  $(".detail_show").click(function() {
    nama = $(this).closest('tr').find('.nama').text();
    id = $(this).closest('tr').find('.id').text();
    $('#nama').val(nama);
    $('#id').val(id);

    // alert(jenis_jasa);
  });
  $("#cancel_transaksi").click(function() {
    $('#nama_member').val('');
    $('#alamat').val('');
    $('#no_telp').val('');

    // alert('cancel klik');
  });
  $("#cancel_kurir").click(function() {
    $('#nama').val('');
    $('#id').val('');

    // alert('cancel klik');
  });
  $("#tugaskan").click(function(e) {


    e.preventDefault();

    var id = $("#id").val();
    var nama = $("#nama").val();
    $.ajax({
      url: "{{ route('tugaskan') }}",
      type: "post",
      dataType: 'JSON',
      data: {
        "_token": "{{ csrf_token() }}",
        nama: nama,
        id: id
      },
      success: function(data) {
        console.log(data);
        $("#mytable_kurir").load("http://127.0.0.1:8000/login_kasir #mytable_kurir");
        $('#nama').val('');
        $('#id').val('');
        location.reload();
      }
    });
  });
</script>
@endsection