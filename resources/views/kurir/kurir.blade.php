@extends('layouts.sidebar_kurir')

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Transaksi Ditugaskan Baru</h4>
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
                  <button type="button" class="btn btn-success" id="ambil">Ambil</button>
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
        <h4 class="card-title">Transaksi Proses Ambil</h4>
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
              @foreach($transaksi_mengambil as $t)
              <tr>
                <td class="id">{{ $t->id }}</td>
                <td>{{ $t->nama_member }}</td>
                <td>{{ $t->jenis_jasa }}</td>
                <td>{{ $t->total_harga }}</td>
                <td>{{ $t->metode_pembayaran }}</td>
                <td>{{ $t->created_at }}</td>
                <td>{{ $t->status_transaksi }}</td>
                <td>
                  <button type="button" class="btn btn-success" id="diambil">Diambil</button>
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
        <h4 class="card-title">Transaksi Diambil</h4>
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
              @foreach($transaksi_diambil as $t)
              <tr>
                <td class="id">{{ $t->id }}</td>
                <td>{{ $t->nama_member }}</td>
                <td>{{ $t->jenis_jasa }}</td>
                <td>{{ $t->total_harga }}</td>
                <td>{{ $t->metode_pembayaran }}</td>
                <td>{{ $t->created_at }}</td>
                <td>{{ $t->status_transaksi }}</td>
                <td>
                  <button type="button" class="btn btn-success" id="antri">Antri</button>
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
        <h4 class="card-title">Transaksi Antri</h4>
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
              @foreach($transaksi_antri as $t)
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
        <h4 class="card-title">Transaksi Tunggu</h4>
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
              @foreach($transaksi_tunggu as $t)
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
        <h4 class="card-title">Transaksi Siap</h4>
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
                  <button type="button" class="btn btn-success" id="diantar">Antar</button>
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
        <h4 class="card-title">Transaksi Diantar</h4>
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
              @foreach($transaksi_diantar as $t)
              <tr>
                <td class="id">{{ $t->id }}</td>
                <td>{{ $t->nama_member }}</td>
                <td>{{ $t->jenis_jasa }}</td>
                <td>{{ $t->total_harga }}</td>
                <td>{{ $t->metode_pembayaran }}</td>
                <td>{{ $t->created_at }}</td>
                <td>{{ $t->status_transaksi }}</td>
                <td>
                  <button type="button" class="btn btn-success" id="selesai">Selesai</button>
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
          <div class="form-group">
            <label for="exampleInputPassword4">Status Pembayaran</label>
            <input type="text" readonly class="form-control" id="status_pembayaran">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Pembayaran ( jika Cash / Belum Lunas )</label>
            <input type="text" class="form-control" id="status_pembayaran">
          </div>
          <button type="button" style="float: right;color:white;margin-bottom:20px" class="btn btn-warning" id="cancel_transaksi">Reset Transaksi</button>
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
<script type="text/javascript">
  $.ajaxSetup({

    headers: {

      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

  });

  $("#cancel_transaksi").click(function() {
    $('#nama_member').val('');
    $('#alamat').val('');
    $('#no_telp').val('');

    // alert('cancel klik');
  });
  $("#ambil").click(function(e) {
    e.preventDefault();
    id = $(this).closest('tr').find('.id').text();
    $.ajax({
      url: "{{ route('ambil') }}",
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
  $("#diambil").click(function(e) {
    e.preventDefault();
    id = $(this).closest('tr').find('.id').text();
    $.ajax({
      url: "{{ route('diambil') }}",
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
  $("#antri").click(function(e) {
    e.preventDefault();
    id = $(this).closest('tr').find('.id').text();
    $.ajax({
      url: "{{ route('antri') }}",
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
  $("#diantar").click(function(e) {
    e.preventDefault();
    id = $(this).closest('tr').find('.id').text();
    $.ajax({
      url: "{{ route('diantar') }}",
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
  $("#selesai").click(function(e) {
    e.preventDefault();
    id = $(this).closest('tr').find('.id').text();
    $.ajax({
      url: "{{ route('selesai') }}",
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
</script>
@endsection