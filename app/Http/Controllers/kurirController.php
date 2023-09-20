<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class kurirController extends Controller
{
    public function login_kurir(Request $request) {
        $users = DB::table('users')->where('jabatan', 'kurir')->where('status', '')->get();
        return view('kurir/kurir',['users' => $users]);
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
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
}
