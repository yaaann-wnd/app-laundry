@extends('layouts.sidebar_kasir')

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Transaksi Masuk</h4>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Id Transaksi</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomer Telepon</th>
                <th>Tanggal Order</th>
                <th>Status Transaksi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <button type="button" class="btn btn-success">Proses</button>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modaldelete">Detail</button>
                  <div class="modal fade" id="modaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="" method="post">
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Id Transaksi</label>
                                  <input type="text" readonly class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Id Member</label>
                                  <input type="text" readonly class="form-control" value="">
                                </div>
                              </div>
                            </div>
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
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Harga Per KG</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">KG Order</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Total Harga</label>
                                  <input type="text" class="form-control" value="">
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

                            </div>
                          </div>
                          <div class="modal-footer">
                            <!-- <button type="submit" class="btn btn-primary">Tidak Terkirim</button> -->
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Kurir Tabel</h4>
        <div class="table-responsive">
          <table class="table table-striped" id="mytable_kurir">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Id Kurir</th>
                <th>Alamat</th>
                <th>Nomer Telepon</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $p)
              <tr>
                <td class="nama">{{ $p->nama }}</td>
                <td class="id">{{ $p->id }}</td>
                <td class="alamat">{{ $p->alamat }}</td>
                <td class="no_telp">{{ $p->no_telp }}</td>
                <td class="status">{{ $p->status }}</td>
                <td>
                  <button type="button" class="btn btn-success detail_show">Tugaskan</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Transaksi</h4>
        <form class="forms-sample">
          <div class="form-group">
            <label for="exampleInputName1">Id Transaksi</label>
            <input type="text" class="form-control" readonly id="id_transaksi">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Nama Member</label>
            <input type="text" class="form-control" id="nama_member">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Alamat</label>
            <input type="text" class="form-control" id="alamat">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Nomer Telepon</label>
            <input type="text" class="form-control" id="no_telp">
          </div>
          <button type="button" style="float: right;color:white" class="btn btn-warning" id="cancel_transaksi">Reset Transaksi</button>
        </form>
        <h4 class="card-title">Data Kurir</h4>
        <form class="forms-sample">
          <div class="form-group">
            <label for="exampleInputName1">Nama</label>
            <input type="text" readonly class="form-control" id="nama">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Id Kurir</label>
            <input type="text" readonly class="form-control" id="id">
          </div>
          <button type="button" class="btn btn-primary mr-2" id="tugaskan">Tugaskan</button>
          <button type="button" class="btn btn-light" id="cancel_kurir">Reset Kurir</button>
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