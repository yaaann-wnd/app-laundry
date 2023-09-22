@extends('layouts.sidebar_kurir')

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
                <button type="button" class="btn btn-success detail_map">Detail</button>
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
                  <button type="button" class="btn btn-success detail_map">Detail</button>
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
        <form class="forms-sample" action="{{ route('transaksi_selesai') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Id Transaksi</label>
            <input type="text" class="form-control" name="id_transaksi" readonly id="id_transaksi">
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
          <div class="form-group">
            <label for="exampleInputPassword4">Jenis Jasa</label>
            <input type="text" class="form-control" id="jenis_jasa">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Total Pembayaran</label>
            <input type="text" class="form-control" id="total_harga">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Status Pembayaran</label>
            <input type="text" readonly class="form-control" id="status_pembayaran_akhir">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Pembayaran ( jika Cash / Belum Lunas )</label>
            <input type="text" class="form-control" id="pembayaran">
          </div>
           <!-- <table class="table table-bordered">
            <tr>
              <th>Jenis Jasa</th>
              <td id="jenis_jasa_akhir"></td>
              <td id="harga_perkg"></td>
            </tr>
            <tr>
              <th colspan="2">Order</th>
              <td id="kg_order"></td>
            </tr>
            <tr>
              <th colspan="2">Total</th>
              <td id="total_harga"></td>
            </tr>
            <tr>
              <th colspan="2">Pembayaran</th>
              <td id="pembayaran"></td>
            </tr>
            <tr>
              <th colspan="2">Kembalian</th>
              <td id="kembalian"></td>
            </tr>
          </table> -->
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

  $(".detail_map").click(function(e) {
    e.preventDefault();
    id = $(this).closest('tr').find('.id').text();
    $.ajax({
      url: "{{ route('detail_map') }}",
      type: "post",
      dataType: 'JSON',
      data: {
        "_token": "{{ csrf_token() }}",
        id: id
      },
      success: function(data_transaksi) {
        console.log(data_transaksi);
        $('#id_transaksi').val(data_transaksi.transaksi[0]['id']);
        $('#nama_member').val(data_transaksi.transaksi[0]['nama_member']);
        $('#alamat').val(data_transaksi.transaksi[0]['alamat_member']);
        $('#no_telp').val(data_transaksi.transaksi[0]['no_telp_member']);
        $('#status_pembayaran_akhir').val(data_transaksi.transaksi[0]['status_pembayaran']);
        $('#jenis_jasa').val(data_transaksi.transaksi[0]['jenis_jasa']);
        $('#total_harga').val(data_transaksi.transaksi[0]['total_harga']);
        $('#pembayaran').val(data_transaksi.transaksi[0]['pembayaran']);

      }
    });
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