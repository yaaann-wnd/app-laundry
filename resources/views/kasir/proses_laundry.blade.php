@extends('layouts.sidebar_kasir')

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Laundry Antri</h4>
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
              @foreach($transaksi as $t)
              <tr>
                <td class="id">{{ $t->id }}</td>
                <td>{{ $t->nama_member }}</td>
                <td>{{ $t->jenis_jasa }}</td>
                <td>{{ $t->total_harga }}</td>
                <td>{{ $t->metode_pembayaran }}</td>
                <td>{{ $t->created_at }}</td>
                <td>{{ $t->status_transaksi }}</td>
                <td>
                  <button type="button" id="" class="btn btn-success proses_laundry_kerja">Proses</button>
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
        <h4 class="card-title">Laundry Dikerjakan</h4>
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
              @foreach($transaksi_siap as $t)
              <tr>
                <td class="id">{{ $t->id }}</td>
                <td>{{ $t->nama_member }}</td>
                <td>{{ $t->jenis_jasa }}</td>
                <td>{{ $t->total_harga }}</td>
                <td>{{ $t->metode_pembayaran }}</td>
                <td>{{ $t->created_at }}</td>
                <td>{{ $t->status_transaksi }}</td>
                <td>
                  <button type="button" id="" class="btn btn-success proses_laundry_siap">Siap</button>
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
        <form class="forms-sample" action="{{ route('tugaskan') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="exampleInputName1">Id Transaksi</label>
            <input type="hidden" class="form-control" readonly name="id_kasir" value="{{ Auth::user()->id }}" id="id_kasir">
            <input type="text" class="form-control" readonly name="id_transaksi" id="id_transaksi">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Nama Member</label>
            <input type="text" class="form-control" name="nama_member" id="nama_member">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Nomer Telepon</label>
            <input type="text" class="form-control" name="no_telp" id="no_telp">
          </div>
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
    $('#id_kurir').val(id);

    // alert(jenis_jasa);
  });
  $(".proses_laundry_kerja").click(function(e) {
    e.preventDefault();
    id = $(this).closest('tr').find('.id').text();
    $.ajax({
      url: "{{ route('proses_laundry_kerja') }}",
      type: "post",
      dataType: 'JSON',
      data: {
        "_token": "{{ csrf_token() }}",
        id: id
      },
      success: function(data) {
        console.log(data);
        location.reload();
      }
    });
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
        // $('#status_pembayaran_akhir').val(data_transaksi.transaksi[0]['status_pembayaran']);
        // $('#jenis_jasa').val(data_transaksi.transaksi[0]['jenis_jasa']);
        // $('#total_harga').val(data_transaksi.transaksi[0]['total_harga']);
      }
    });
  });
  $(".proses_laundry_siap").click(function(e) {
    e.preventDefault();
    id = $(this).closest('tr').find('.id').text();
    $.ajax({
      url: "{{ route('proses_laundry_siap') }}",
      type: "post",
      dataType: 'JSON',
      data: {
        "_token": "{{ csrf_token() }}",
        id: id
      },
      success: function(data) {
        console.log(data);
        location.reload();
      }
    });
  });
  $("#cancel_transaksi").click(function() {
    $('#nama_member').val('');
    $('#alamat').val('');
    $('#no_telp').val('');

    // alert('cancel klik');
  });
  $("#cancel_kurir").click(function() {
    $('#nama').val('');
    $('#id_kurir').val('');

    // alert('cancel klik');
  });
  // $("#tugaskan").click(function(e) {


  //   e.preventDefault();

  //   var id = $("#id").val();
  //   var nama = $("#nama").val();
  //   $.ajax({
  //     url: "{{ route('tugaskan') }}",
  //     type: "post",
  //     dataType: 'JSON',
  //     data: {
  //       "_token": "{{ csrf_token() }}",
  //       nama: nama,
  //       id: id
  //     },
  //     success: function(data) {
  //       console.log(data);
  //       $("#mytable_kurir").load("http://127.0.0.1:8000/login_kasir #mytable_kurir");
  //       $('#nama').val('');
  //       $('#id').val('');
  //       location.reload();
  //     }
  //   });
  // });
</script>
@endsection