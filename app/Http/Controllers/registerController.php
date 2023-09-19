<?php

namespace App\Http\Controllers;

use App\Models\Member;
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
        return view('member/transaksi');
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
