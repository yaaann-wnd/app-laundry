<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Member;
use App\Models\ProdukJasa;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class registerController extends Controller
{
    public function register()
    {
        if (Auth::check()) {
            return redirect('/member/home');
        } else {
            return view('member.register');
        }
    }

    public function profile(Request $request)
    {

        if (Auth::check()) {
            return view('member/profile');
        } else {
            return view('member.register');
        }
    }
    public function transaksi()
    {
        $produk_jasa = DB::table('produk_jasa')->get();
        $transaksi = DB::table('transaksi')
            ->join('member', 'transaksi.id_member', '=', 'member.id')
            ->join('produk_jasa', 'transaksi.id_jasa', '=', 'produk_jasa.id')
            ->select('transaksi.*', 'member.nama_member', 'member.alamat_member', 'member.no_telp_member', 'produk_jasa.jenis_jasa', 'produk_jasa.harga_perkg')
            ->get();
        return view('member/transaksi', ['produk_jasa' => $produk_jasa, 'transaksi' => $transaksi]);
    }
    public function data_jasa(Request $request)
    {
        $jasa = $request->jasa;
        $produk_jasa = DB::table('produk_jasa')->where('id', $jasa)->get();
        $data['jasa'] = [];
        foreach ($produk_jasa as $value) {
            array_push($data['jasa'], $value);
        }
        echo json_encode($data);
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'nama_member' => 'required|unique:member',
            'alamat_member' => 'required|min:5',
            'no_telp_member' => 'required|unique:member',
            'password' => 'required|min:5'
        ]);

        $tambahMember = Member::create([
            'nama_member' => $request->nama_member,
            'alamat_member' => $request->alamat_member,
            'no_telp_member' => $request->no_telp_member,
            'password' => Hash::make($request->password)
        ]);

        if (!$tambahMember) {
            return redirect(route('register'))->with('error', 'Registrasi Gagal!');
        }

        return redirect(route('login'))->with('success', 'Berhasil membuat akun, silahkan Login!');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('/member/home');
        } else {
            return view('member.login');
        }
    }

    public function beranda()
    {
        $id_foto_random = rand(1, 3);
        $paket = ProdukJasa::all();

        return view('member.home', ['paket' => $paket, 'foto' => $id_foto_random]);
    }

    public function edit_profile_member(Request $request)
    {
        // dd(Auth::user()->id);
        $id = Auth::user()->id;
        $nama_member = $request->nama_member;
        $alamat_member = $request->alamat_member;
        $no_telp_member = $request->no_telp_member;
        $password_baru = $request->password_baru;
        // $data = array(
        // 	'status' =>'Ditugaskan',
        // );
        // $user = user::find($id);
        // $user->update($data);

        // return response()->json($id);

        $data = array(
            'nama_member' => $nama_member,
            'alamat_member' => $alamat_member,
            'no_telp_member' => $no_telp_member,
            'password' => Hash::make($password_baru),
        );
        $user = Member::find($id);
        $user->update($data);
        return redirect('profile');

        // return redirect(route('profile_kasir'))->with('error', 'Password lama tidak sama ');
    }
    public function order_member(Request $request)
    {
        // dd($request->all());
        $id = Auth::user()->id;
        $jasa = $request->jasa;
        $harga_perkg = $request->harga_perkg;
        $kg_order = $request->kg_order;
        $total_harga = $request->total_harga;
        $metode_pembayaran = $request->metode_pembayaran;
        // $password_baru = $request->password_baru;
        // // $data = array(
        // // 	'status' =>'Ditugaskan',
        // // );
        // // $user = user::find($id);
        // // $user->update($data);

        // // return response()->json($id);

        Transaksi::create([
            'id_member' => $id,
            'id_jasa' => $jasa,
            'harga_perkg' => $harga_perkg,
            'kg_order' => $kg_order,
            'total_harga' => $total_harga,
            'metode_pembayaran' => $metode_pembayaran,
            'status_transaksi' => 'Belum Dibayar',
        ]);
        //     $user = Member::find($id);
        //     $user->update($data);
        return redirect('transaksi');

        // // return redirect(route('profile_kasir'))->with('error', 'Password lama tidak sama ');
    }
    public function loginProses(Request $request)
    {
        $request->validate([
            'nama_member' => 'required',
            'password' => 'required'
        ]);

        $credentials2 = $request->only('nama_member', 'password');

        if (Auth::guard('member')->attempt($credentials2)) {
            $request->session()->regenerate();

            return redirect()->intended('/member/home');
        }

        return redirect(route('login'))->with('error', 'Nama atau Password yang anda masukkan salah!');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }

    public function midtrans($id)
    {
        $pesanan = Transaksi::find($id);
        $harga = $pesanan->total_harga;
        $order_id = $pesanan->id;
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => $harga,
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return json_encode($snapToken);
    }

    public function success(Request $request)
    {
        $json = json_decode($request->get('json'));
        $order_id = $json->order_id;
        $find_order = Transaksi::where('id', $order_id)->first();
        $find_order_2 = Transaksi::find($find_order->id);

        $find_order_2->update([
            'status_transaksi' => 'Sudah Dibayar',
            'status_pembayaran' => 'Lunas'
        ]);

        return redirect('/transaksi');
    }
}
