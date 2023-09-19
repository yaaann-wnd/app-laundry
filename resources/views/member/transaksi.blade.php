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
                <th>Total Pembayaran</th>
                <th>Status Pembayaran</th>
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

          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#order">Order</button>
          <div class="modal fade" id="order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Order</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="post">
                  <div class="modal-body">
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
                          <select name="jasa" class="form-control" id="jasa">
                            @foreach($produk_jasa as $p)
                            <option value="{{ $p->id }}">{{ $p->jenis_jasa }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Harga Per KG</label>
                          <input type="text" readonly id="harga_perkg" class="form-control" value="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">KG Order</label>
                          <input type="text" id="kg_order" class="form-control" value="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Total Harga</label>
                          <input type="text" id="total_harga" class="form-control" value="">
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
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly" defer></script>
<script>
  function initMap() {
    const myLatlng = {
      lat: -25.363,
      lng: 131.044
    };
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 4,
      center: myLatlng,
    });
    // Create the initial InfoWindow.
    let infoWindow = new google.maps.InfoWindow({
      content: "Click the map to get Lat/Lng!",
      position: myLatlng,
    });

    infoWindow.open(map);
    // Configure the click listener.
    map.addListener("click", (mapsMouseEvent) => {
      // Close the current InfoWindow.
      infoWindow.close();
      // Create a new InfoWindow.
      infoWindow = new google.maps.InfoWindow({
        position: mapsMouseEvent.latLng,
      });
      infoWindow.setContent(
        JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2),
      );
      infoWindow.open(map);
    });
  }

  window.initMap = initMap;
  $.ajaxSetup({

    headers: {

      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

  });
  $(document).ready(function() {
    var jasa = $("#jasa").val();
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