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
                  <button type="button" class="btn btn-success ambil" id="">Ambil</button>
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
                  <button type="button" class="btn btn-success diambil" id="">Diambil</button>
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
                  <button type="button" class="btn btn-success antri" id="">Antri</button>
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
                  <button type="button" class="btn btn-success diantar" id="">Antar</button>
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
                  <button type="button" class="btn btn-success selesai">Selesai</button>
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
        <div id="map" class="maps" style="width: 100%; height: 450px;"></div>
        <div id="panel"></div>
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
          <button type="submit" style="float: right;color:white;margin-bottom:20px" class="btn btn-success" id="transaksi_selesai">Selesai</button>
          <button type="button" style="float: right;color:white;margin-bottom:20px" class="btn btn-primary" id="bayar">Bayar</button>
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

  $("#cancel_transaksi").click(function() {
    $('#nama_member').val('');
    $('#alamat').val('');
    $('#no_telp').val('');

    // alert('cancel klik');
  });
  $(".ambil").click(function(e) {
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
  $(".diambil").click(function(e) {
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
  $(".antri").click(function(e) {
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
  $(".diantar").click(function(e) {
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
  $("#bayar").click(function(e) {
    e.preventDefault();
    var id_transaksi = $("#id_transaksi").val();
    var pembayaran = $("#pembayaran").val();
    var total_harga = $("#total_harga").val();
    if (pembayaran >= total_harga) {
      $.ajax({
        url: "{{ route('bayar_kurir') }}",
        type: "post",
        dataType: 'JSON',
        data: {
          "_token": "{{ csrf_token() }}",
          id: id,
          pembayaran: pembayaran
        },
        success: function(data_transaksi) {
          console.log(data_transaksi);
          $('#status_pembayaran_akhir').val(data_transaksi.transaksi[0]['status_pembayaran']);
        }
      });
    } else {
      alert('Pembayaran Kurang');
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
        addInfoBubble({
          lat: data_transaksi.transaksi[0]['latitude'],
          lng: data_transaksi.transaksi[0]['longitude']
        }, {
          id: data_transaksi.transaksi[0]['id'],
          nama_member: data_transaksi.transaksi[0]['nama_member'],
          alamat_member: data_transaksi.transaksi[0]['alamat_member'],
          no_telp_member: data_transaksi.transaksi[0]['no_telp_member'],
        })

      }
    });
  });
  $(".selesai").click(function(e) {
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
      success: function(data_transaksi) {
        console.log(data_transaksi);
        $('#id_transaksi').val(data_transaksi.transaksi[0]['id']);
        $('#nama_member').val(data_transaksi.transaksi[0]['nama_member']);
        $('#alamat').val(data_transaksi.transaksi[0]['alamat_member']);
        $('#no_telp').val(data_transaksi.transaksi[0]['no_telp_member']);
        $('#status_pembayaran_akhir').val(data_transaksi.transaksi[0]['status_pembayaran']);
        $('#jenis_jasa').val(data_transaksi.transaksi[0]['jenis_jasa']);
        $('#total_harga').val(data_transaksi.transaksi[0]['total_harga']);

      }
    });
  });
</script>
<script>
  /**
   * Adds markers to the map highlighting the locations of the captials of
   * France, Italy, Germany, Spain and the United Kingdom.
   *
   * @param  {H.Map} map      A HERE Map instance within the application
   */
  function markerlaundry(lat, lng) {
    var icon = new H.map.Icon("{{ asset('images/laundry.png') }}");
    $.ajax({
      url: "{{ route('laundry_alamat') }}",
      type: "post",
      dataType: 'JSON',
      data: {
        "_token": "{{ csrf_token() }}",
      },
      success: function(data) {
        console.log(data);
        console.log(data.laundry[0]['latitude_laundry']);
        for (var i = 0; i < data.laundry.length; i++) {
          var laundrymarker = new H.map.Marker({
            lat: data.laundry[i]['latitude_laundry'],
            lng: data.laundry[i]['longitude_laundry']
          }, { icon: icon });
          map.addObject(laundrymarker);
        }
      }
    });

  }
  var marker_satu = new H.map.Marker({
    lat: -7.983908,
    lng: 112.621391
  });

  function addMarkerToGroup(group, koordinat, html) {
    var marker = new H.map.Marker(koordinat);
    marker.setData(html);
    marker_satu = marker;
    group.addObject(marker);
    map.setCenter(koordinat);
    map.setZoom(15);
  }

  function addInfoBubble(koordinat, identitas) {
    marker_satu.setVisibility(false);
    var group = new H.map.Group();

    map.addObject(group);

    // add 'tap' event listener, that opens info bubble, to the group
    group.addEventListener('tap', function(evt) {
      // event target is the marker itself, group is a parent event target
      // for all objects that it contains
      var bubble = new H.ui.InfoBubble(evt.target.getGeometry(), {
        // read custom data
        content: evt.target.getData()
      });
      // show info bubble
      ui.addBubble(bubble);
    }, false);

    addMarkerToGroup(group, {
        lat: koordinat.lat,
        lng: koordinat.lng
      },
      '<div>' + identitas.id + '</div>' +
      '<div>' + identitas.nama_member + '</div>' +
      '<div>' + identitas.alamat_member + '</div>' +
      '<div>' + identitas.no_telp_member + '</div>');
  }
  // function addMarker(coords){
  //   			console.log(coords.nama);
  //   			var marker = new google.maps.Marker({
  //   				position:{lat:coords.lat,lng:coords.lng},
  //   				title: coords.nama,
  //   				map:map,
  //   			});
  //   		}
  /**
   * Boilerplate map initialization code starts below:
   */

  //Step 1: initialize communication with the platform
  // In your own code, replace variable window.apikey with your own apikey
  var platform = new H.service.Platform({
    apikey: 'ETTutWrmcsi3Ojr3lfh1qNDwuHKZoaF4O_PMSGRXnEk'
  });
  var defaultLayers = platform.createDefaultLayers();

  //Step 2: initialize a map - this map is centered over Europe
  var map = new H.Map(document.getElementById('map'),
    defaultLayers.vector.normal.map, {
      center: {
        lat: -7.995728689820596,
        lng: 112.61954804522718
      },
      zoom: 16,
      pixelRatio: window.devicePixelRatio || 1
    });
  // add a resize listener to make sure that the map occupies the whole container
  window.addEventListener('resize', () => map.getViewPort().resize());

  //Step 3: make the map interactive
  // MapEvents enables the event system
  // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
  var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

  // Create the default UI components
  var ui = H.ui.UI.createDefault(map, defaultLayers);

  // Now use the map as required...
  window.onload = function() {
    addInfoBubble(map);
  }
  window.onload = function() {
    markerlaundry(map);
  }
</script>
@endsection