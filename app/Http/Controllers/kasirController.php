<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class kasirController extends Controller
{
    public function login_kasir(Request $request) {
        $users = DB::table('users')->where('jabatan', 'kurir')->where('status', '')->get();
        return view('kasir/kasir',['users' => $users]);
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
}
