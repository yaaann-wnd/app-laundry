<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class registerController extends Controller
{
    public function register(Request $request) {
        // dd($request->all());
        Member::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'password' => $request->no_telp,
        ]);

        // return redirect('/');
    }
}
