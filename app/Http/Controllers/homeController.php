<?php

namespace App\Http\Controllers;

use App\Models\ProdukJasa;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function home() {
        $paket = ProdukJasa::all();
        $foto = rand(1, 3);

        return view('home', ['paket' => $paket, 'foto' => $foto]);
    }
}
