@extends('layouts.sidebar')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Laundry</h4>
                    <form class="forms-sample" action="{{ route('laundry.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputName1">Nama</label>
                                    <input type="text" class="form-control" name="nama_laundry" id="nama-laundry"
                                        placeholder="Nama Laundry">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Alamat</label>
                                    <input type="text" class="form-control" name="alamat_laundry" id="alamat-laundry"
                                        placeholder="Alamat Laundry">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <div id="map" style="width: 100%; height: 30vh;"></div>
                            <div id="panel"></div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="longitude_laundry">Longitude</label>
                                    <input type="text" class="form-control" readonly name="longitude_laundry_tambah"
                                        id="longitude_laundry">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="latitude_laundry">Latitude</label>
                                    <input type="text" class="form-control" name="latitude_laundry"
                                        id="latitude_laundry_tambah" readonly>
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="simpan_admin" class="btn btn-primary mr-2">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Laundry</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Laundry</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laundry as $l)
                                    <tr>
                                        <td>{{ $l->nama_laundry }}</td>
                                        <td>{{ $l->alamat_laundry }}</td>
                                        <td>
                                            <form action="{{ route('laundry.destroy', $l->id) }}" method="POST"
                                                style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <a href="#" onclick="return confirm('Yakin hapus Data ?')">
                                                    <button class="btn btn-danger btn-sm">Hapus</button> </a>
                                            </form>
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
@endsection

@section('script')
    <script>
        /**
         * Adds a  draggable marker to the map..
         *
         * @param {H.Map} map                      A HERE Map instance within the
         *                                         application
         * @param {H.mapevents.Behavior} behavior  Behavior implements
         *                                         default interactions for pan/zoom
         */
        function addDraggableMarker(map, behavior) {

            var marker = new H.map.Marker({
                lat: -7.9493234160115485,
                lng: 112.63198058763396
            }, {
                // mark the object as volatile for the smooth dragging
                volatility: true
            });
            // Ensure that the marker can receive drag events
            marker.draggable = true;
            map.addObject(marker);

            // disable the default draggability of the underlying map
            // and calculate the offset between mouse and target's position
            // when starting to drag a marker object:
            map.addEventListener('dragstart', function(ev) {
                var target = ev.target,
                    pointer = ev.currentPointer;
                if (target instanceof H.map.Marker) {
                    var targetPosition = map.geoToScreen(target.getGeometry());
                    target['offset'] = new H.math.Point(pointer.viewportX - targetPosition.x, pointer.viewportY -
                        targetPosition.y);
                    behavior.disable();
                }
            }, false);


            // re-enable the default draggability of the underlying map
            // when dragging has completed
            map.addEventListener('dragend', function(ev) {
                var target = ev.target;
                if (target instanceof H.map.Marker) {
                    behavior.enable();
                }
            }, false);

            // Listen to the drag event and move the position of the marker
            // as necessary
            map.addEventListener('drag', function(ev) {
                var target = ev.target,
                    pointer = ev.currentPointer;
                if (target instanceof H.map.Marker) {
                    target.setGeometry(map.screenToGeo(pointer.viewportX - target['offset'].x, pointer.viewportY -
                        target['offset'].y));
                    $('#longitude_laundry_tambah').val(target.a.lng);
                    $('#latitude_laundry_tambah').val(target.a.lat);
                }
            }, false);
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

        //Step 2: initialize a map - this map is centered over Boston
        var map = new H.Map(document.getElementById('map'),
            defaultLayers.vector.normal.map, {
                center: {
                    lat: -7.9493234160115485,
                    lng: 112.63198058763396
                },
                zoom: 12,
                pixelRatio: window.devicePixelRatio || 1
            });
        // add a resize listener to make sure that the map occupies the whole container
        window.addEventListener('resize', () => map.getViewPort().resize());

        //Step 3: make the map interactive
        // MapEvents enables the event system
        // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
        var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

        // Step 4: Create the default UI:
        var ui = H.ui.UI.createDefault(map, defaultLayers, 'en-US');

        // Add the click event listener.
        addDraggableMarker(map, behavior);
    </script>
@endsection
