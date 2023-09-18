<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class kasirController extends Controller
{
    public function login_kasir(Request $request) {
        $users = DB::table('users')->where('jabatan', 'kurir')->get();
        return view('kasir/kasir',['users' => $users]);
    }
    
    public function tugaskan(Request $request) {
        // dd($request->all());
        $id = $request->id;
        $jenis_jasa = $request->jenis_jasa;
        $harga_perkg = $request->harga_perkg;

		$data = array(
			'jenis_jasa' =>$jenis_jasa,
			'harga_perkg' =>$harga_perkg,
		);
        // $ProdukJasa = ProdukJasa::find($id);
        // $ProdukJasa->update($data);
     
        return response()->json($data);
    }
}
