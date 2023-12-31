<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ProdukJasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class adminController extends Controller
{
    public function login_admin(Request $request)
    {
        // dd($request->all());
        $jabatan = $request->jabatan;
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
                'jabatan' => 'required',
            ],
            [
                'username.required' => 'Username tidak boleh kosong!',
                'password.required' => 'Password tidak boleh kosong!',
                'jabatan.required' => 'Jabatan tidak boleh kosong!',
            ]
        );

        $credentials = $request->only('username', 'password', 'jabatan');

        if (Auth::attempt($credentials)) {
            if ($jabatan == 'admin') {
                return redirect()->intended('harga_jasa');
            } elseif ($jabatan == 'kasir') {
                return redirect()->intended('login_kasir');
            } elseif ($jabatan == 'kurir') {
                return redirect()->intended('login_kurir');
            }
        }

        return redirect('/login')->with('error', 'Data yang anda masukkan salah!');
    }

    public function laporan_transaksi_masuk(Request $request)
    {
        $users = DB::table('users')->where('jabatan', 'admin')->get();
        return view('admin/laporan_transaksi_masuk', ['users' => $users]);
    }
    public function laporan_transaksi_selesai(Request $request)
    {
        $users = DB::table('users')->where('jabatan', 'admin')->get();
        return view('admin/laporan_transaksi_selesai', ['users' => $users]);
    }
    public function status_kurir(Request $request)
    {
        $users = DB::table('users')->where('jabatan', 'admin')->get();
        return view('admin/status_kurir', ['users' => $users]);
    }
    public function data_member(Request $request)
    {
        $users = DB::table('users')->get();
        return view('admin/data_member', ['users' => $users]);
    }
    public function admin_home(Request $request)
    {
        $users = DB::table('users')->where('jabatan', 'admin')->get();
        return view('admin/register_admin', ['users' => $users]);
    }
    public function harga_jasa(Request $request)
    {
        $users = DB::table('produk_jasa')->get();
        return view('admin/harga_jasa', ['users' => $users]);
    }
    public function register_admin(Request $request)
    {
        $users = DB::table('users')->where('jabatan', 'admin')->get();
        return view('admin/register_admin', ['users' => $users]);
    }
    public function register_kasir(Request $request)
    {
        $users = DB::table('users')->where('jabatan', 'kasir')->get();
        return view('admin/register_kasir', ['users' => $users]);
    }
    public function register_kurir(Request $request)
    {
        $users = DB::table('users')->where('jabatan', 'kurir')->get();
        return view('admin/register_kurir', ['users' => $users]);
    }
    public function edit_jasa(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $jenis_jasa = $request->jenis_jasa;
        $harga_perkg = $request->harga_perkg;

        $data = array(
            'jenis_jasa' => $jenis_jasa,
            'harga_perkg' => $harga_perkg,
        );
        $ProdukJasa = ProdukJasa::find($id);
        $ProdukJasa->update($data);

        return response()->json($data);
    }
    public function delete_jasa(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $ProdukJasa = ProdukJasa::find($id);
        $ProdukJasa->delete();

        return response()->json($id);
    }
    public function delete_user_kasir(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $user = User::find($id);
        $user->delete();

        return redirect(route('register_kasir'));
    }
    public function delete_user_kurir(Request $request)
    {
        // dd($request->all());
        $id = $request->id;
        $user = User::find($id);
        $user->delete();

        return redirect(route('register_kurir'));
    }
    public function simpan_jasa(Request $request)
    {
        // dd($request->all());
        ProdukJasa::create([
            'jenis_jasa' => $request->jenis_jasa,
            'harga_perkg' => $request->harga_perkg,
        ]);

        return redirect(route('harga_jasa'));
    }
    public function simpan_admin(Request $request)
    {
        // dd($request->all());
        User::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'status' => '',
            'jabatan' => 'admin',
        ]);

        return redirect(route('register_admin'));
    }
    public function simpan_kasir(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|unique:users',
            'password' => 'required',
            'username' => 'required|unique:users',
        ],
        [
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'no_telp.required' => 'Nomor Telepon tidak boleh kosong',
            'no_telp.unique' => 'Nomor Telepon sudah digunakan',
            'password.required' => 'Password tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah digunakan',
        ]);
        // dd($request->all());
        User::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'status' => '',
            'jabatan' => 'kasir',
        ]);

        return redirect(route('register_kasir'));
    }
    public function simpan_kurir(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|unique:users',
            'password' => 'required',
            'username' => 'required|unique:users',
        ],
        [
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'no_telp.required' => 'Nomor Telepon tidak boleh kosong',
            'no_telp.unique' => 'Nomor Telepon sudah digunakan',
            'password.required' => 'Password tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah digunakan',
        ]);


        User::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'status' => '',
            'jabatan' => 'kurir',
        ]);

        return redirect(route('register_kurir'));
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
