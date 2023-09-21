@extends('layouts.sidebar_kasir')

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Transaksi Selesai Cash</h4>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead style="text-align: center;">
              <tr>
                <th>Id Transaksi</th>
                <th>Nama Member</th>
                <th>Jenis Jasa</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
                <th>Tanggal Order</th>
                <th>Status Transaksi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($transaksi_cash as $t)
              <tr>
                <td class="id">{{ $t->id }}</td>
                <td>{{ $t->nama_member }}</td>
                <td>{{ $t->jenis_jasa }}</td>
                <td>{{ $t->total_harga }}</td>
                <td>{{ $t->metode_pembayaran }}</td>
                <td>{{ $t->created_at }}</td>
                <td>{{ $t->status_transaksi }}</td>
                <td>
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
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Id Transaksi</label>
                                  <input type="text" readonly class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Id Member</label>
                                  <input type="text" readonly class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Nama</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Alamat</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Nomer Telepon</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Jasa</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Harga Per KG</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">KG Order</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Total Harga</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Metode Pembayaran</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Pembayaran ( Nominal )</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Status Pembayaran</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Nama Kasir</label>
                                  <input readonly type="text" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Id Kasir</label>
                                  <input readonly type="text" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Nama Kurir</label>
                                  <input readonly type="text" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Id Kurir</label>
                                  <input readonly type="text" class="form-control" value="">
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
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Transaksi Midtrans</h4>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead style="text-align: center;">
              <tr>
                <th>Id Transaksi</th>
                <th>Nama Member</th>
                <th>Jenis Jasa</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
                <th>Tanggal Order</th>
                <th>Status Transaksi</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($transaksi_midtrans as $t)
              <tr>
                <td class="id">{{ $t->id }}</td>
                <td>{{ $t->nama_member }}</td>
                <td>{{ $t->jenis_jasa }}</td>
                <td>{{ $t->total_harga }}</td>
                <td>{{ $t->metode_pembayaran }}</td>
                <td>{{ $t->created_at }}</td>
                <td>{{ $t->status_transaksi }}</td>
                <td>
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
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Id Transaksi</label>
                                  <input type="text" readonly class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Id Member</label>
                                  <input type="text" readonly class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Nama</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Alamat</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Nomer Telepon</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Jasa</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Harga Per KG</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">KG Order</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Total Harga</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Metode Pembayaran</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Pembayaran ( Nominal )</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Status Pembayaran</label>
                                  <input type="text" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Nama Kasir</label>
                                  <input readonly type="text" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Id Kasir</label>
                                  <input readonly type="text" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Nama Kurir</label>
                                  <input readonly type="text" class="form-control" value="">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Id Kurir</label>
                                  <input readonly type="text" class="form-control" value="">
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
              @endforeach
            </tbody>
          </table>
        </div>
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
  $("#cancel_kurir").click(function() {
    $('#nama').val('');
    $('#id').val('');

    // alert(jenis_jasa);
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