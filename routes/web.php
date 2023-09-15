<?php

use App\Http\Controllers\registerController;
use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('autenticate/login');
});

Route::get('/register', function () {
    return view('member/register');
});

Route::get('member/home', function () {
    return view('layouts.sidebar');
});

Route::post('admin', [adminController::class, 'admin'])->name('admin');
Route::post('kasir', [kasirController::class, 'kasir'])->name('kasir');
Route::post('daftar', [registerController::class, 'register'])->name('register');
