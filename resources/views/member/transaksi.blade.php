@extends('layouts.sidebar_member')

@section('content')
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card" style="padding: 10px 50px;">
            <div class="card" style="box-shadow: 5px 5px 5px 5px #c4c0c0;">
                <div class="card-body">
                    <h4 class="card-title">Pesanan Saya</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id Transaksi</th>
                                    <th>Nama</th>
                                    <th>Jasa</th>
                                    <th>Total Harga</th>
                                    <th>Status Pembayaran</th>
                                    <th>Tanggal Order</th>
                                    <th>Status Transaksi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($transaksi as $t)
                                        <td>{{ $t->id }}</td>
                                        <td>{{ $t->nama_member }}</td>
                                        <td>{{ $t->jenis_jasa }}</td>
                                        <td>{{ $t->total_harga }}</td>
                                        <td>{{ $t->status_pembayaran }}</td>
                                        <td>{{ $t->created_at }}</td>
                                        <td>{{ $t->status_transaksi }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success detail" id="tombol-detail"
                                                onclick="bayar({{ $t->id }})">Detail</button>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <button type="button" class="btn btn-success" data-toggle="modal"
                            data-target="#order">Order</button>
                        <div class="modal fade" id="order" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Order</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('order_member') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Nama</label>
                                                        <input type="text" name="nama_member" id="nama"
                                                            class="form-control" value="{{ Auth::user()->nama_member }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Alamat</label>
                                                        <textarea name="alamat" id="alamat_member" class="form-control">{{ Auth::user()->alamat_member }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Nomer Telepon</label>
                                                        <input type="text" name="no_telp_member" id="no_telp"
                                                            class="form-control"
                                                            value="{{ Auth::user()->no_telp_member }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Jasa</label>
                                                        <select name="jasa" class="form-control" id="jasa">
                                                            @foreach ($produk_jasa as $p)
                                                                <option value="{{ $p->id }}">{{ $p->jenis_jasa }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Harga Per KG</label>
                                                        <input type="text" readonly id="harga_perkg" name="harga_perkg"
                                                            class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">KG Order</label>
                                                        <input type="text" id="kg_order" name="kg_order"
                                                            class="form-control" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Total Harga</label>
                                                        <input type="text" id="total_harga" name="total_harga"
                                                            class="form-control" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Metode Pembayaran</label>
                                                        <select name="metode_pembayaran" class="form-control"
                                                            id="metode_pembayaran">
                                                            <option value="midtrans">Midtrans</option>
                                                            <option value="cash">Cash</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Lokasi</label>
                                                <div id="map" style="height: 100%;"></div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Order</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 grid-margin stretch-card" style="padding: 10px 50px;" id="detail">
            <div class="card" style="box-shadow: 5px 5px 5px 5px #c4c0c0;">
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
                        <div class="form-group">
                            <label for="exampleInputPassword4">Status Pembayaran</label>
                            <input type="text" readonly class="form-control" id="status_pembayaran">
                        </div>
                        <button type="button" style="float: right;color:white;margin-bottom:20px"
                            class="btn btn-warning" id="cancel_transaksi">Reset Transaksi</button>
                        <table class="table table-bordered">
                            <tr>
                                <th>Jenis Jasa</th>
                                <td>Cuci + Setrika</td>
                                <td>15000</td>
                            </tr>
                            <tr>
                                <th colspan="2">Jumlah</th>
                                <td>2 Kg</td>
                            </tr>
                            <tr>
                                <th colspan="2">Total</th>
                                <td>30000</td>
                            </tr>
                            <tr>
                                <th colspan="2">Pembayaran</th>
                                <td>50000</td>
                            </tr>
                            <tr>
                                <th colspan="2">Kembalian</th>
                                <td>20000</td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <form action="/success" id="submit_form" method="POST">
        @csrf
        <input type="hidden" name="json" id="call_json">
    </form>
    <script>
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });
        $(document).ready(function() {
            var jasa = $("#jasa").val();
            $("#detail").hide();
            $.ajax({
                url: "{{ route('data_jasa') }}",
                type: "post",
                dataType: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    jasa: jasa
                },
                success: function(data) {
                    console.log(data.jasa[0]['harga_perkg']);
                    // $("#mytable_kurir").load("http://127.0.0.1:8000/login_kasir #mytable_kurir");
                    $('#harga_perkg').val(data.jasa[0]['harga_perkg']);
                    // $('#id').val('');
                    // location.reload();
                }
            });
        });

        $("#kg_order").keyup(function() {
            var kg_order = $("#kg_order").val();
            var harga_perkg = $("#harga_perkg").val();
            var total_harga = kg_order * harga_perkg;
            $('#total_harga').val(total_harga);
        });
        $("#jasa").change(function(e) {
            var jasa = $("#jasa").val();
            e.preventDefault();
            $.ajax({
                url: "{{ route('data_jasa') }}",
                type: "post",
                dataType: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    jasa: jasa
                },
                success: function(data) {
                    console.log(data.jasa[0]['harga_perkg']);
                    // $("#mytable_kurir").load("http://127.0.0.1:8000/login_kasir #mytable_kurir");
                    $('#harga_perkg').val(data.jasa[0]['harga_perkg']);
                    // $('#id').val('');
                    // location.reload();
                }
            });
        });
    </script>
@endsection
