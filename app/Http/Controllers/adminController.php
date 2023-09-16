<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function login_admin(Request $request) {
        return view('admin/register_admin');
    }
    public function register_admin(Request $request) {
        return view('admin/register_admin');
    }
    public function register_kasir(Request $request) {
        return view('admin/register_kasir');
    }
    public function register_kurir(Request $request) {
        return view('admin/register_kurir');
    }
}
