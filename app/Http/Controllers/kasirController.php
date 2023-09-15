<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kasirController extends Controller
{
    public function kasir(Request $request) {
        return view('kasir/kasir');
    }
}
