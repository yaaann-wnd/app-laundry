<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function register() {
        return view('member.register');
    }


    public function registerProses(Request $request) {
        $request->validate([
            'nama' => ['required', 'unique:member'],
            'alamat' => ['required', 'min:5'],
            'no_telp' => ['required', 'max:13', 'numeric'],
            'password' => ['required', 'min:5']
        ])

        User::create([
            'nama' => $request->nama,
            'alamat' => $request->nama,
            'notlp' => $request->nama,
            'password' => $request->nama,
            '' => $request->nama,
        ])

        return redirect('member/home');
    }
}
