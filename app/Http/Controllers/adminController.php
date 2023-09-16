<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function login_admin(Request $request) {
        return view('admin/register_admin');
    }
    public function register_admin(Request $request) {
        return view('admin/register_admin');
    }
    public function register_kasir(Request $request) {
        return view('admin/register_kasir');
    }
    public function register_kurir(Request $request) {
        return view('admin/register_kurir');
    }
    public function simpan_admin(Request $request) {
        User::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'notelp' => $request->notlp,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'jabatan' => 'admin',
        ]);

        return redirect(route('register_admin'));
    }
}
