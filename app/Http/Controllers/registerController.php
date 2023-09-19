<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Member;
use App\Models\ProdukJasa;
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

    public function profile(Request $request) {

        if (Auth::check()) {
            return view('member/profile');
        } else {
            return view('member.register');
        }
    }
    public function transaksi(Request $request) {
        $produk_jasa = DB::table('produk_jasa')->get();
        return view('member/transaksi',['produk_jasa' => $produk_jasa]);
    }
    public function data_jasa(Request $request) {
        $jasa = $request->jasa;
        $produk_jasa = DB::table('produk_jasa')->where('id', $jasa)->get();
		$data['jasa'] = [];
        foreach($produk_jasa as $value) {
			array_push($data['jasa'], $value);
		} 
		echo json_encode($data);
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:member',
            'alamat' => 'required|min:5',
            'no_telp' => 'required|unique:member',
            'password' => 'required|min:5'
        ]);

        $tambahMember = Member::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password)
        ]);

        if (!$tambahMember) {
            return redirect(route('register'))->with('error', 'Registrasi Gagal!');
        }

        return redirect(route('login-member'))->with('success', 'Berhasil membuat akun, silahkan Login!');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('/member/home');
        } else {
            return view('member.login');
        }
    }

    public function beranda() {
        $id_foto_random = rand(1, 3);
        $paket = ProdukJasa::all();

        return view('member.home', ['paket' => $paket, 'foto' => $id_foto_random]);
    }

    public function edit_profile_member(Request $request)
    {
        // dd(Auth::user()->id);
        $id = Auth::user()->id;
        $nama = $request->nama;
        $alamat = $request->alamat;
        $no_telp = $request->no_telp;
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
                'password' => Hash::make($password_baru),
            );
            $user = Member::find($id);
            $user->update($data);
            return redirect('profile');

        // return redirect(route('profile_kasir'))->with('error', 'Password lama tidak sama ');
    }
    public function order_member(Request $request)
    {
        dd($request->all());
        $id = Auth::user()->id;
        $nama = $request->nama;
        $alamat = $request->alamat;
        $no_telp = $request->no_telp;
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

            $data = array(
                'nama' => $nama,
                'alamat' => $alamat,
                'no_telp' => $no_telp,
                'jasa' => $jasa,
                'harga_perkg' => $harga_perkg,
                'kg_order' => $kg_order,
                'total_harga' => $total_harga,
                'metode_pembayaran' => $metode_pembayaran,
            );
        //     $user = Member::find($id);
        //     $user->update($data);
        //     return redirect('profile');

        // // return redirect(route('profile_kasir'))->with('error', 'Password lama tidak sama ');
    }
    public function loginProses(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'password' => 'required'
        ]);

        $credentials2 = $request->only('nama', 'password');

        if (Auth::guard('member')->attempt($credentials2)) {
            $request->session()->regenerate();

            return redirect()->intended('/member/home');
        }

        return redirect(route('login-member'))->with('error', 'Nama atau Password yang anda masukkan salah!');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login-member');
    }
}
