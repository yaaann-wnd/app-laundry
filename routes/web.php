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

Route::post('login_admin', [adminController::class, 'login_admin'])->name('login_admin');
Route::get('register_admin', [adminController::class, 'register_admin'])->name('register_admin');
Route::get('register_kasir', [adminController::class, 'register_kasir'])->name('register_kasir');
Route::get('register_kurir', [adminController::class, 'register_kurir'])->name('register_kurir');

Route::post('kasir', [kasirController::class, 'kasir'])->name('kasir');
Route::post('kurir', [kurirController::class, 'kurir'])->name('kurir');
Route::post('daftar', [registerController::class, 'register'])->name('register');
