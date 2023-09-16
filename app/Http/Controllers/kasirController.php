<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class kasirController extends Controller
{
    public function login_kasir(Request $request) {
        $users = DB::table('users')->where('jabatan', 'kurir')->get();
        return view('kasir/kasir',['users' => $users]);
    }
}
