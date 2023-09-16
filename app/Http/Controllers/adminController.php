<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function login_admin(Request $request) {
        $users = DB::table('users')->where('jabatan', 'admin')->get();
        return view('admin/register_admin',['users' => $users]);
    }
    public function harga_jasa(Request $request) {
        $users = DB::table('users')->where('jabatan', 'admin')->get();
        return view('admin/harga_jasa',['users' => $users]);
    }
    public function register_admin(Request $request) {
        $users = DB::table('users')->where('jabatan', 'admin')->get();
        return view('admin/register_admin',['users' => $users]);
    }
    public function register_kasir(Request $request) {
        $users = DB::table('users')->where('jabatan', 'kasir')->get();
        return view('admin/register_kasir',['users' => $users]);
    }
    public function register_kurir(Request $request) {
        $users = DB::table('users')->where('jabatan', 'kurir')->get();
        return view('admin/register_kurir',['users' => $users]);
    }
    public function simpan_admin(Request $request) {
        // dd($request->all());
        User::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'jabatan' => 'admin',
        ]);

        return redirect(route('register_admin'));
    }
    public function simpan_kasir(Request $request) {
        // dd($request->all());
        User::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'jabatan' => 'kasir',
        ]);

        return redirect(route('register_kasir'));
    }
    public function simpan_kurir(Request $request) {
        // dd($request->all());
        User::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'jabatan' => 'kurir',
        ]);

        return redirect(route('register_kurir'));
    }
}
