<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class kurirController extends Controller
{
    public function login_kurir(Request $request)
    {
        $id = Auth::user()->id;
        $transaksi = DB::table('transaksi')
            ->where('transaksi.id_user_kurir', '=', $id)
            ->where('transaksi.status_kurir', '=', '')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $transaksi_mengambil = DB::table('transaksi')
            ->where('transaksi.id_user_kurir', '=', $id)
            ->where('transaksi.status_kurir', '=', 'Mengambil')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $transaksi_diambil = DB::table('transaksi')
            ->where('transaksi.id_user_kurir', '=', $id)
            ->where('transaksi.status_kurir', '=', 'Diambil')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $transaksi_antri = DB::table('transaksi')
            ->where('transaksi.id_user_kurir', '=', $id)
            ->where('transaksi.status_kurir', '=', 'Antri')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $transaksi_tunggu = DB::table('transaksi')
            ->where('transaksi.id_user_kurir', '=', $id)
            ->where('transaksi.status_kurir', '=', 'Tunggu')
            ->where('transaksi.status_transaksi', '=', 'Dikerjakan')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $transaksi_siap = DB::table('transaksi')
            ->where('transaksi.id_user_kurir', '=', $id)
            ->where('transaksi.status_kurir', '=', 'Tunggu')
            ->where('transaksi.status_transaksi', '=', 'Siap')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $transaksi_diantar = DB::table('transaksi')
            ->where('transaksi.id_user_kurir', '=', $id)
            ->where('transaksi.status_kurir', '=', 'Diantar')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $users = DB::table('users')->where('jabatan', 'kurir')->where('status', '')->get();
        return view('kurir/kurir', ['users' => $users, 'transaksi_mengambil' => $transaksi_mengambil, 'transaksi' => $transaksi, 'transaksi_diambil' => $transaksi_diambil, 'transaksi_antri' => $transaksi_antri, 'transaksi_tunggu' => $transaksi_tunggu, 'transaksi_diantar' => $transaksi_diantar, 'transaksi_siap' => $transaksi_siap]);
    }

    public function profile_kurir(Request $request)
    {
        $users = DB::table('users')->where('jabatan', 'kurir')->where('status', '')->get();
        return view('kurir/profile_kurir', ['users' => $users]);
    }
    public function edit_profile_kurir(Request $request)
    {
        // dd(Auth::user()->id);
        $id = Auth::user()->id;
        $nama = $request->nama;
        $alamat = $request->alamat;
        $no_telp = $request->no_telp;
        $username = $request->username;
        $password_baru = $request->password_baru;
        // $data = array(
        // 	'status' =>'Ditugaskan',
        // );
        // $user = user::find($id);
        // $user->update($data);

        // return response()->json($id);

        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'username' => $username,
            'password' => Hash::make($password_baru),
        );

        $user = user::find($id);
        $user->update($data);
        return redirect('profile_kurir');

        // return redirect(route('profile_kasir'))->with('error', 'Password lama tidak sama ');
    }

    public function aktif(Request $request)
    {
        // dd($request->all());
        $id = $request->id;

        $data = array(
            'status' => 'aktif',
        );
        $user = user::find($id);
        $user->update($data);

        echo json_encode($data);
    }
    public function nonaktif(Request $request)
    {
        // dd($request->all());
        $id = $request->id;

        $data = array(
            'status' => '',
        );
        $user = user::find($id);
        $user->update($data);

        echo json_encode($data);
    }
    public function status_kurir(Request $request)
    {
        $id_user_kurir = $request->id_user_kurir;
        $user = DB::table('users')->where('id', $id_user_kurir)->get();
        $data['kurir'] = [];
        foreach ($user as $value) {
            array_push($data['kurir'], $value);
        }
        echo json_encode($data);
    }
    public function ambil(Request $request)
    {
        // dd($request->all());
        $id = $request->id;

        $data = array(
            'status_kurir' => 'Mengambil',
        );
        $transaksi = Transaksi::find($id);
        $transaksi->update($data);

        echo json_encode($data);
    }
    public function diambil(Request $request)
    {
        // dd($request->all());
        $id = $request->id;

        $data = array(
            'status_kurir' => 'Diambil',
        );
        $transaksi = Transaksi::find($id);
        $transaksi->update($data);

        echo json_encode($data);
    }
    public function antri(Request $request)
    {
        // dd($request->all());
        $id = $request->id;

        $data = array(
            'status_kurir' => 'Antri',
        );
        $transaksi = Transaksi::find($id);
        $transaksi->update($data);

        echo json_encode($data);
    }
    public function diantar(Request $request)
    {
        // dd($request->all());
        $id = $request->id;

        $data = array(
            'status_kurir' => 'Diantar',
        );
        $transaksi = Transaksi::find($id);
        $transaksi->update($data);

        echo json_encode($data);
    }
    public function selesai(Request $request)
    {
        // dd($request->all());
        $id = $request->id;

        $data = array(
            'status_kurir' => 'Selesai',
            'status_transaksi' => 'Selesai',
        );
        $transaksi = Transaksi::find($id);
        $transaksi->update($data);

        echo json_encode($data);
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
