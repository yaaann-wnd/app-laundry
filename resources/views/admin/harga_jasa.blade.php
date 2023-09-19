@extends('layouts.sidebar')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Jasa</h4>
                    <p class="card-description">
                        Basic form elements
                    </p>
                    <form class="forms-sample" action="{{ route('simpan_jasa') }}" method="POST" id="myform">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Nama Jasa</label>
                            <input type="text" class="form-control" name="jenis_jasa" id="jenis_jasa"
                                placeholder="Nama Jasa">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Id</label>
                            <input type="text" readonly="" class="form-control" name="id" id="id">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Harga Per KG</label>
                            <input type="text" class="form-control" name="harga_perkg" id="harga_perkg"
                                placeholder="Harga Per KG">
                        </div>
                        <button type="submit" id="simpan_jasa" class="btn btn-primary mr-2">Submit</button>
                        <button type="button" id="edit_jasa" class="btn btn-primary mr-2">Edit</button>
                        <button type="button" id="delete_jasa" class="btn btn-primary mr-2">Delete</button>
                        <button type="button" id="cancel_jasa" class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Striped Table</h4>
                    <div class="table-responsive">
                        <table class="table table-striped " id="mytable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nama Jasa</th>
                                    <th>Harga Per KG</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $p)
                                    <tr>
                                        <td class="id">{{ $p->id }}</td>
                                        <td class="jenis_jasa">{{ $p->jenis_jasa }}</td>
                                        <td class="harga_perkg">{{ $p->harga_perkg }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success alf edit_show">Detail</button>
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
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });
        $('#cancel_jasa').click(function() {
            $(this).closest('form').find("input[type=text], textarea").val("");
        });
        $(".edit_show").click(function() {
            jenis_jasa = $(this).closest('tr').find('.jenis_jasa').text();
            harga_perkg = $(this).closest('tr').find('.harga_perkg').text();
            id = $(this).closest('tr').find('.id').text();
            $('#jenis_jasa').val(jenis_jasa);
            $('#harga_perkg').val(harga_perkg);
            $('#id').val(id);

            // alert(jenis_jasa);
        });
        $("#edit_jasa").click(function(e) {


            e.preventDefault();

            var id = $("#id").val();
            var jenis_jasa = $("#jenis_jasa").val();
            var harga_perkg = $("#harga_perkg").val();
            $.ajax({
                url: "{{ route('edit_jasa') }}",
                type: "post",
                dataType: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    jenis_jasa: jenis_jasa,
                    harga_perkg: harga_perkg,
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    $("#mytable").load("http://127.0.0.1:8000/harga_jasa #mytable");
                    $('#jenis_jasa').val('');
                    $('#harga_perkg').val('');
                    $('#id').val('');
                    location.reload();
                }
            });
        });
        $("#delete_jasa").click(function(e) {


            e.preventDefault();

            var id = $("#id").val();
            $.ajax({
                url: "{{ route('delete_jasa') }}",
                type: "post",
                dataType: 'JSON',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    $("#mytable").load("http://127.0.0.1:8000/harga_jasa #mytable");
                    $('#jenis_jasa').val('');
                    $('#harga_perkg').val('');
                    $('#id').val('');
                    location.reload();
                }
            });
        });
    </script>
@endsection
