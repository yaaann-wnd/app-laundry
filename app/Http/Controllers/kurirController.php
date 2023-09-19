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
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
}
