<?php

use App\Http\Controllers\registerController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\kasirController;
use App\Http\Controllers\kurirController;
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
    return redirect('/login');
});

Route::get('/login', function () {
    return view('autenticate/login');
});

Route::post('login_admin', [adminController::class, 'login_admin'])->name('login_admin');
Route::get('harga_jasa', [adminController::class, 'harga_jasa'])->name('harga_jasa');
Route::post('simpan_admin', [adminController::class, 'simpan_admin'])->name('simpan_admin');
Route::post('edit_jasa', [adminController::class, 'edit_jasa'])->name('edit_jasa');
Route::post('delete_jasa', [adminController::class, 'delete_jasa'])->name('delete_jasa');
Route::post('simpan_jasa', [adminController::class, 'simpan_jasa'])->name('simpan_jasa');
Route::post('simpan_kasir', [adminController::class, 'simpan_kasir'])->name('simpan_kasir');
Route::post('simpan_kurir', [adminController::class, 'simpan_kurir'])->name('simpan_kurir');
Route::get('register_admin', [adminController::class, 'register_admin'])->name('register_admin');
Route::get('register_kasir', [adminController::class, 'register_kasir'])->name('register_kasir');
Route::get('register_kurir', [adminController::class, 'register_kurir'])->name('register_kurir');


Route::get('login_kasir', [kasirController::class, 'login_kasir'])->name('login_kasir');
Route::post('kasir', [kasirController::class, 'kasir'])->name('kasir');

Route::post('kurir', [kurirController::class, 'kurir'])->name('kurir');

// register member
Route::get('register', [registerController::class, 'register'])->name('register');
Route::post('registerProses', [registerController::class, 'registerProses'])->name('registerProses');

// login member
Route::get('login-member', [registerController::class, 'login'])->name('login');
Route::post('login-member-proses', [registerController::class, 'loginProses'])->name('loginProses');

// logout member
Route::get('logout', [registerController::class, 'logout'])->name('logout');

// Autentikasi ketika user sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('member/home', function () {
        return view('member.home');
    });
});
