@extends('layouts.sidebar_member')

@section('content')
    <div class="row" style="height: 50vh !important;">
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
                                    <th>Status Pesanan</th>
                                    <th>Status Kurir</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $t)
                                    <tr>
                                        <td class="id">{{ $t->id }}</td>
                                        <td>{{ $t->nama_transaksi }}</td>
                                        <td><span style="white-space: nowrap;">{{ $t->jenis_jasa }}</span></td>
                                        <td>{{ $t->total_harga }}</td>
                                        <td>{{ $t->status_pembayaran }}</td>
                                        <td>{{ $t->created_at }}</td>
                                        <td>{{ $t->status_transaksi }}</td>
                                        <td>{{ $t->status_kurir }}</td>
                                        <td>
                                            <div class="d-flex" style="column-gap: .6rem !important;">
                                                <button type="button" class="btn btn-success detail">Detail</button>
                                                <button type="button" onclick="bayar('{{ $t->kode_pembayaran }}')"
                                                    class="btn {{ $t->status_pembayaran == 'Lunas' ? 'btn-secondary disabled' : 'btn-primary' }}"
                                                    {{ $t->status_pembayaran == 'Lunas' ? 'disabled' : '' }}>Bayar</button>
                                            </div>
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
                                                        <input type="text" name="nama_member" id="nama_member"
                                                            class="form-control" value="{{ Auth::user()->nama_member }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Alamat</label>
                                                        <textarea name="alamat_member" id="alamat_member" class="form-control">{{ Auth::user()->alamat_member }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Nomer Telepon</label>
                                                        <input type="text" name="no_telp_member" id="no_telp_member"
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
                                                        <label for="exampleFormControlInput1">Aroma Parfum</label>
                                                        <select name="aroma_parfum" class="form-control" id="aroma_parfum">
                                                            @foreach ($aroma_parfum as $p)
                                                                <option value="{{ $p->id }}">{{ $p->aroma_parfum }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Harga Per KG</label>
                                                        <input type="text" readonly id="harga_perkg" name="harga_perkg"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">KG Order</label>
                                                        <input type="text" id="kg_order" name="kg_order"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Total Harga</label>
                                                        <input type="text" id="total_harga" name="total_harga"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Lokasi</label>
                                                <div id="map" style="width: 100%; height: 450px;"></div>
                                                <div id="panel"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Latitude</label>
                                                        <input type="text" readonly id="latitude" name="latitude"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Longitude</label>
                                                        <input type="text" readonly id="longitude" name="longitude"
                                                            class="form-control">
                                                    </div>
                                                </div>
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
    <div class="col-12 grid-margin stretch-card" style="padding: 10px 50px; height: 50vh !important; " id="detail">
        <div class="card" style="box-shadow: 5px 5px 5px 5px #c4c0c0; position: static !important;">
            <div class="card-body">
                <h4 class="card-title">Data Transaksi</h4>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputName1">Id Transaksi</label>
                        <input type="text" class="form-control" readonly id="id_transaksi">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Nama Member</label>
                        <input type="text" class="form-control" id="nama_member_detail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Alamat</label>
                        <input type="text" class="form-control" id="alamat_member_detail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Nomer Telepon</label>
                        <input type="text" class="form-control" id="no_telp_member_detail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Status Pembayaran</label>
                        <input type="text" readonly class="form-control" id="status_pembayaran">
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th>Jenis Jasa</th>
                            <td id="jenis_jasa_detail"></td>
                            <td id="harga_perkg_detail"></td>
                        </tr>
                        <tr>
                            <th colspan="2">Jumlah</th>
                            <td id="kg_order_detail"></td>
                        </tr>
                        <tr>
                            <th colspan="2">Total Harga</th>
                            <td id="total_harga_detail"></td>
                        </tr>
                        <tr>
                            <th colspan="2">Pembayaran</th>
                            <td id="pembayaran_detail"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <form action="/success" method="post" id="submit_form">
        @csrf
        <input type="hidden" name="json" id="call_json">
    </form>
    <form action="/pending" method="post" id="submit_form_pending">
        @csrf
        <input type="hidden" name="json_pending" id="call_json_pending">
    </form>
@endsection

@section('ajax')
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
        $(".detail").click(function() {
            id = $(this).closest('tr').find('.id').text();
            $.ajax({
                url: "{{ route('detail_transaksi') }}",
                type: "post",
                dataType: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    $("#detail").show();
                    $('#id_transaksi').val(data.transaksi[0]['id']);
                    $('#nama_member_detail').val(data.transaksi[0]['nama_member']);
                    $('#alamat_member_detail').val(data.transaksi[0]['alamat_member']);
                    $('#no_telp_member_detail').val(data.transaksi[0]['no_telp_member']);
                    $('#status_pembayaran').val(data.transaksi[0]['status_pembayaran']);
                    $('#jenis_jasa_detail').html(data.transaksi[0]['jenis_jasa']);
                    $('#harga_perkg_detail').html(data.transaksi[0]['harga_perkg']);
                    $('#kg_order_detail').html(data.transaksi[0]['kg_order']);
                    $('#total_harga_detail').html(data.transaksi[0]['total_harga']);
                    $('#pembayaran_detail').html(data.transaksi[0]['pembayaran']);
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
    <script>
        /**
         * An event listener is added to listen to tap events on the map.
         * Clicking on the map displays an alert box containing the latitude and longitude
         * of the location pressed.
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
                        }, {
                            icon: icon
                        });
                        map.addObject(laundrymarker);
                    }
                }
            });

        }

        var marker_satu = new H.map.Marker({
            lat: -7.983908,
            lng: 112.621391
        });
        var markerarray = [];

        function setUpClickListener(map) {
            // Attach an event listener to map display
            // obtain the coordinates and display in an alert box.
            map.addEventListener('tap', function(evt) {
                var coord = map.screenToGeo(evt.currentPointer.viewportX,
                    evt.currentPointer.viewportY);
                $('#latitude').val(coord.lat);
                $('#longitude').val(coord.lng);
                // map.removeObjects(marker_satu);
                marker_satu.setVisibility(false);
                addMarkersToMap({
                    lat: coord.lat,
                    lng: coord.lng
                })

            });
        }

        function addMarkersToMap(koordinat) {
            var marker = new H.map.Marker({
                lat: koordinat.lat,
                lng: koordinat.lng
            });
            marker_satu = marker;
            map.addObject(marker_satu);
            // markerarray.push(marker);
            // for (var i = markerarray.length - 1; i < markerarray.length; i++){
            //     map.addObject(markerarray[i]);
            // }
            //     console.log(markerarray);
            // for(var j = 0; j < markerarray.length-1; j++){
            //     console.log(markerarray[j]);

            // }
        }


        /**
         * Boilerplate map initialization code starts below:
         */

        //Step 1: initialize communication with the platform
        // In your own code, replace variable window.apikey with your own apikey
        var platform = new H.service.Platform({
            apikey: 'ETTutWrmcsi3Ojr3lfh1qNDwuHKZoaF4O_PMSGRXnEk'
        });
        var defaultLayers = platform.createDefaultLayers();

        //Step 2: initialize a map
        var map = new H.Map(document.getElementById('map'),
            defaultLayers.vector.normal.map, {
                center: {
                    lat: -7.983908,
                    lng: 112.621391
                },
                zoom: 15,
                pixelRatio: window.devicePixelRatio || 1
            });
        // add a resize listener to make sure that the map occupies the whole container
        window.addEventListener('resize', () => map.getViewPort().resize());

        //Step 3: make the map interactive
        // MapEvents enables the event system
        // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
        var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

        // Step 4: create custom logging facilities
        var logContainer = document.createElement('ul');
        logContainer.className = 'log';
        logContainer.innerHTML = '<li class="log-entry">Try clicking on the map</li>';
        map.getElement().appendChild(logContainer);

        // Helper for logging events
        function logEvent(str) {
            var entry = document.createElement('li');
            entry.className = 'log-entry';
            entry.textContent = str;
            logContainer.insertBefore(entry, logContainer.firstChild);
        }


        setUpClickListener(map);
        markerlaundry(map);
    </script>
@endsection
