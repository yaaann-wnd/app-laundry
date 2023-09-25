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
    public function login_kurir()
    {
        $id = Auth::user()->id;
        $transaksi = DB::table('transaksi')
            ->where('transaksi.status_kurir', '=', '-')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.id as id_transaksi', 'transaksi.nama_transaksi', 'transaksi.order_user', 'transaksi.metode_pembayaran', 'transaksi.created_at', 'transaksi.total_harga', 'transaksi.status_transaksi', 'member.nama_member', 'produk_jasa.jenis_jasa')
            ->get();

        // dd($transaksi);
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
            ->where('transaksi.status_kurir', '=', 'Menunggu Cucian')
            ->where('transaksi.status_transaksi', '=', 'Sedang Dicuci')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $transaksi_siap = DB::table('transaksi')
            ->where('transaksi.id_user_kurir', '=', $id)
            ->where('transaksi.status_kurir', '=', 'Cucian Selesai')
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
        $laundry = DB::table('laundry')->get();
        return view('kurir/kurir', ['users' => $users, 'transaksi_mengambil' => $transaksi_mengambil, 'transaksi' => $transaksi, 'transaksi_diambil' => $transaksi_diambil, 'transaksi_antri' => $transaksi_antri, 'transaksi_tunggu' => $transaksi_tunggu, 'transaksi_diantar' => $transaksi_diantar, 'transaksi_siap' => $transaksi_siap, 'laundry' => $laundry]);
    }

    public function kurir_kasir(Request $request)
    {
        $id = Auth::user()->id;
        $transaksi = DB::table('transaksi')
            ->where('transaksi.id_user_kurir', '=', null)
            ->where('transaksi.status_kurir', '=', null)
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
            ->where('transaksi.status_kurir', '=', 'Menunggu Cucian')
            ->where('transaksi.status_transaksi', '=', 'Sedang Dicuci')
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
        $laundry = DB::table('laundry')->get();
        return view('kurir/kurir_kasir', ['users' => $users, 'transaksi_mengambil' => $transaksi_mengambil, 'transaksi' => $transaksi, 'transaksi_diambil' => $transaksi_diambil, 'transaksi_antri' => $transaksi_antri, 'transaksi_tunggu' => $transaksi_tunggu, 'transaksi_diantar' => $transaksi_diantar, 'transaksi_siap' => $transaksi_siap, 'laundry' => $laundry]);
    }
    public function kurir_member(Request $request)
    {
        $id = Auth::user()->id;
        $transaksi = DB::table('transaksi')
            ->where('transaksi.id_user_kurir', '=', null)
            ->where('transaksi.status_kurir', '=', null)
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
            ->where('transaksi.status_kurir', '=', 'Menunggu Cucian')
            ->where('transaksi.status_transaksi', '=', 'Sedang Dicuci')
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
        $laundry = DB::table('laundry')->get();
        return view('kurir/kurir_member', ['users' => $users, 'transaksi_mengambil' => $transaksi_mengambil, 'transaksi' => $transaksi, 'transaksi_diambil' => $transaksi_diambil, 'transaksi_antri' => $transaksi_antri, 'transaksi_tunggu' => $transaksi_tunggu, 'transaksi_diantar' => $transaksi_diantar, 'transaksi_siap' => $transaksi_siap, 'laundry' => $laundry]);
    }
    public function transaksi_data_selesai_kurir(Request $request)
    {
        $id = Auth::user()->id;

        $transaksi = $this->login_kurir()->transaksi;

        $transaksi_cash = DB::table('transaksi')
            ->where('transaksi.id_user_kurir', '=', $id)
            ->where('transaksi.status_transaksi', '=', 'selesai')
            ->where('transaksi.metode_pembayaran', '=', 'Cash')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $transaksi_midtrans = DB::table('transaksi')
            ->where('transaksi.id_user_kurir', '=', $id)
            ->where('transaksi.status_transaksi', '=', 'selesai')
            ->where('transaksi.metode_pembayaran', '=', 'Midtrans')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $users = DB::table('users')->where('jabatan', 'kurir')->get();
        return view('kurir/transaksi_data_selesai_kurir', ['users' => $users, 'transaksi_cash' => $transaksi_cash, 'transaksi_midtrans' => $transaksi_midtrans, 'transaksi' => $transaksi]);
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
    public function laundry_alamat(Request $request)
    {
        $laundry_data = DB::table('laundry')->get();
        $data['laundry'] = [];
        foreach ($laundry_data as $value) {
            array_push($data['laundry'], $value);
        }
        echo json_encode($data);
    }
    public function ambil(Request $request)
    {
        // dd(intval($request->id));
        $id = intval($request->id);

        $data = array(
            'id_user_kurir' => Auth::user()->id,
            'status_kurir' => 'Mengambil',
        );
        $transaksi = Transaksi::find($id);
        $transaksi->update($data);

        echo json_encode($data);
    }
    public function diambil(Request $request)
    {
        // dd($request->all());
        $id = intval($request->id);

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
        $id = intval($request->id);

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
        $id = intval($request->id);

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
        $id = intval($request->id);

        $transaksi_data = DB::table('transaksi')
            ->where('transaksi.id', '=', $id)
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $data_transaksi['transaksi'] = [];
        foreach ($transaksi_data as $value) {
            array_push($data_transaksi['transaksi'], $value);
        }
        // $data = array(
        //     'status_kurir' => 'Selesai',
        //     'status_transaksi' => 'Selesai',
        // );
        // $transaksi = Transaksi::find($id);
        // $transaksi->update($data);

        echo json_encode($data_transaksi);
    }
    public function detail_map(Request $request)
    {
        // dd($request->all());
        $id = $request->id;

        $transaksi_data = DB::table('transaksi')
            ->where('transaksi.id', '=', $id)
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $data_transaksi['transaksi'] = [];
        foreach ($transaksi_data as $value) {
            array_push($data_transaksi['transaksi'], $value);
        }
        // $data = array(
        //     'status_kurir' => 'Selesai',
        //     'status_transaksi' => 'Selesai',
        // );
        // $transaksi = Transaksi::find($id);
        // $transaksi->update($data);

        echo json_encode($data_transaksi);
    }
    public function bayar_kurir(Request $request)
    {
        // dd($request->all());

        $id = $request->id;
        $pembayaran = $request->pembayaran;
        $data = array(
            'pembayaran' => $pembayaran,
            'status_pembayaran' => 'Lunas',
            'metode_pembayaran' => 'Cash',
        );
        $transaksi = Transaksi::find($id);
        $transaksi->update($data);
        $transaksi_data = DB::table('transaksi')
            ->where('transaksi.id', '=', $id)
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        $data_transaksi['transaksi'] = [];
        foreach ($transaksi_data as $value) {
            array_push($data_transaksi['transaksi'], $value);
        }


        echo json_encode($data_transaksi);
    }
    public function transaksi_selesai(Request $request)
    {
        // dd(Auth::user()->id);
        $id = $request->id_transaksi;
        $data = array(
            'status_kurir' => 'Selesai',
            'status_transaksi' => 'Selesai',
        );
        $transaksi = Transaksi::find($id);
        $transaksi->update($data);
        return redirect('login_kurir');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
