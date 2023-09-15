<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function admin(Request $request) {
        return view('admin/register_admin');
    }
}
