<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class kasirController extends Controller
{
    public function login_kasir(Request $request) {
        $users = DB::table('users')->where('jabatan', 'kurir')->where('status', '')->get();
        return view('kasir/kasir',['users' => $users]);
    }
    public function profile_kasir(Request $request) {
        $users = DB::table('users')->where('jabatan', 'kurir')->where('status', '')->get();
        return view('kasir/profile_kasir',['users' => $users]);
    }
    public function kasir_data(Request $request) {
        $users = DB::table('users')->where('jabatan', 'kurir')->get();
        return view('kasir/kasir_data',['users' => $users]);
    }
    
    public function tugaskan(Request $request) {
        // dd($request->all());
        $id = $request->id;
		$data = array(
			'status' =>'Ditugaskan',
		);
        $user = user::find($id);
        $user->update($data);
     
        return response()->json($id);
    }
    public function edit_profile_kasir(Request $request) {
        // dd($request->all());
        $id = $request->id;
		$data = array(
			'status' =>'Ditugaskan',
		);
        $user = user::find($id);
        $user->update($data);
     
        return response()->json($id);
    }
    
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
}
