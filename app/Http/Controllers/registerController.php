<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function register() {
        return view('member.register');
    }


    public function registerProses(Request $request) {
        // dd($request->all());
        // Member::create([
        //     'nama' => $request->nama,
        //     'alamat' => $request->alamat,
        //     'no_telp' => $request->no_telp,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect('member/home');
    }
}
