@extends('layouts.sidebar')

@section('content')
    <div class="card p-5">
        <h3>
            Selamat datang, {{ Auth::user()->nama }}
        </h3>
    </div>
@endsection
