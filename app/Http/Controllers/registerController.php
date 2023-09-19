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
        return view('member/profile');
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

        return redirect(route('login'))->with('error', 'Nama atau Password yang anda masukkan salah!');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
}
