<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class kurirController extends Controller
{
    public function login_kurir(Request $request) {
        $users = DB::table('users')->where('jabatan', 'kurir')->where('status', '')->get();
        return view('kurir/kurir',['users' => $users]);
    }
}
