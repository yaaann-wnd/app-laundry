<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kurirController extends Controller
{
    public function kurir(Request $request) {
        return view('kurir/kurir');
    }
}
