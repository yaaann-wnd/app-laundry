<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ProdukJasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function login_admin(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'jabatan' => 'required',
        ]);

        $credentials = $request->only('username', 'password', 'jabatan');

        if (Auth::attempt($credentials)) {
            $users = User::where('jabatan', 'admin')->get();

            return redirect()->intended(view('admin/register_admin', ['users' => $users]));
        }

        return redirect('/')->with('error', 'Data yang anda masukkan salah!');
    }
    
    public function admin_home(Request $request) {
        $users = DB::table('users')->where('jabatan', 'admin')->get();
        return view('admin/register_admin',['users' => $users]);
    }
    public function harga_jasa(Request $request) {
        $users = DB::table('produk_jasa')->get();
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
    public function edit_jasa(Request $request) {
        // dd($request->all());
        $id = $request->id;
        $jenis_jasa = $request->jenis_jasa;
        $harga_perkg = $request->harga_perkg;

		$data = array(
			'jenis_jasa' =>$jenis_jasa,
			'harga_perkg' =>$harga_perkg,
		);
        $ProdukJasa = ProdukJasa::find($id);
        $ProdukJasa->update($data);
     
        return response()->json($data);
    }
    public function delete_jasa(Request $request) {
        // dd($request->all());
        $id = $request->id;
        $ProdukJasa = ProdukJasa::find($id);
        $ProdukJasa->delete();
     
        return response()->json($id);
    }
    public function simpan_jasa(Request $request) {
        // dd($request->all());
        ProdukJasa::create([
            'jenis_jasa' => $request->jenis_jasa,
            'harga_perkg' => $request->harga_perkg,
        ]);

        return redirect(route('harga_jasa'));
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
