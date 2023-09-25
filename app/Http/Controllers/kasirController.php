<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class kasirController extends Controller
{
    public function login_kasir(Request $request)
    {
        $transaksi = DB::table('transaksi')
            ->where('transaksi.status_transaksi', '=', 'Tunggu')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $users = DB::table('users')->where('jabatan', 'kurir')->get();
        return view('kasir/kasir', ['users' => $users, 'transaksi' => $transaksi]);
    }
    public function transaksi_data_selesai(Request $request)
    {
        $transaksi_cash = DB::table('transaksi')
            ->where('transaksi.status_transaksi', '=', 'selesai')
            ->where('transaksi.metode_pembayaran', '=', 'Cash')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $transaksi_midtrans = DB::table('transaksi')
            ->where('transaksi.status_transaksi', '=', 'selesai')
            ->where('transaksi.metode_pembayaran', '=', 'Midtrans')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $users = DB::table('users')->where('jabatan', 'kurir')->get();
        return view('kasir/transaksi_data_selesai', ['users' => $users, 'transaksi_cash' => $transaksi_cash, 'transaksi_midtrans' => $transaksi_midtrans]);
    }
    public function kasir_member_offline(Request $request)
    {
        $online = DB::table('transaksi')
            ->where('transaksi.order_user', '=', 'Member')
            ->where('transaksi.status_kurir', '=', 'antri')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $transaksi = DB::table('transaksi')
            ->where('transaksi.status_transaksi', '=', 'Tunggu')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $users = DB::table('users')->where('jabatan', 'kurir')->get();
        return view('kasir/kasir_member_offline', ['users' => $users, 'transaksi' => $transaksi, 'online' => $online]);
    }
    public function kasir_member_online(Request $request)
    {
        $online = DB::table('transaksi')
            ->where('transaksi.order_user', '=', 'Member')
            ->where('transaksi.status_kurir', '=', 'antri')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $transaksi = DB::table('transaksi')
            ->where('transaksi.status_transaksi', '=', 'Tunggu')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $users = DB::table('users')->where('jabatan', 'kurir')->get();
        return view('kasir/kasir_member_offline', ['users' => $users, 'transaksi' => $transaksi, 'online' => $online]);
    }
    public function proses_laundry(Request $request)
    {
        $transaksi = DB::table('transaksi')
            ->where('transaksi.status_kurir', '=', 'antri')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $transaksi_siap = DB::table('transaksi')
            ->where('transaksi.status_transaksi', '=', 'Sedang Dicuci')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $users = DB::table('users')->where('jabatan', 'kurir')->where('status', '')->get();
        return view('kasir/proses_laundry', ['users' => $users, 'transaksi' => $transaksi, 'transaksi_siap' => $transaksi_siap]);
    }
    public function profile_kasir(Request $request)
    {
        $users = DB::table('users')->where('jabatan', 'kurir')->where('status', '')->get();
        return view('kasir/profile_kasir', ['users' => $users]);
    }
    public function kasir_data(Request $request)
    {
        $transaksi = DB::table('transaksi')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $users = DB::table('users')->where('jabatan', 'kurir')->get();
        return view('kasir/kasir_data', ['users' => $users], ['transaksi' => $transaksi]);
    }

    public function tugaskan(Request $request)
    {
        // dd($request->all());
        $id_kasir = $request->id_kasir;
        $id_transaksi = $request->id_transaksi;
        $id_kurir = $request->id_kurir;
        $data2 = array(
            'id_user_kasir' => $id_kasir,
            'id_user_kurir' => $id_kurir,
            'status_transaksi' => 'Diproses',
            'status_kurir' => 'Kurir akan mengambil pesanan'
        );
        $data = array(
            'status' => 'Ditugaskan',
        );
        $transaksi = transaksi::find($id_transaksi);
        $transaksi->update($data2);
        $user = user::find($id_kurir);
        $user->update($data);
        return redirect('login_kasir');
    }
    public function proses_laundry_kerja(Request $request)
    {
        // dd($request->all());
        $id = intval($request->id);

        $data = array(
            'status_kurir' => 'Menunggu Cucian',
            'status_transaksi' => 'Sedang Dicuci',
        );
        $transaksi = Transaksi::find($id);
        $transaksi->update($data);

        echo json_encode($data);
    }
    public function proses_laundry_siap(Request $request)
    {
        // dd($request->all());
        $id = intval($request->id);

        $data = array(
            'status_transaksi' => 'Siap',
            'status_kurir' => 'Cucian Selesai'
        ); 
        $transaksi = Transaksi::find($id);
        $transaksi->update($data);

        echo json_encode($data);
    }
    public function edit_profile_kasir(Request $request)
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
        return redirect('profile_kasir');

        // return redirect(route('profile_kasir'))->with('error', 'Password lama tidak sama ');
    }
    public function proses_order(Request $request)
    {
        $id = $request->id;
        $transaksi = DB::table('transaksi')
            ->where('transaksi.id', '=', $id)
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $data['transaksi'] = [];
        foreach ($transaksi as $value) {
            array_push($data['transaksi'], $value);
        }
        echo json_encode($data);
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
