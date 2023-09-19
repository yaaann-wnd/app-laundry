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

Route::get('profile_admin', [adminController::class, 'profile_admin'])->name('profile_admin');
Route::post('login_admin', [adminController::class, 'login_admin'])->name('login_admin');
Route::get('harga_jasa', [adminController::class, 'harga_jasa'])->name('harga_jasa');
Route::get('laporan_transaksi_masuk', [adminController::class, 'laporan_transaksi_masuk'])->name('laporan_transaksi_masuk');
Route::get('laporan_transaksi_selesai', [adminController::class, 'laporan_transaksi_selesai'])->name('laporan_transaksi_selesai');
Route::get('status_kurir', [adminController::class, 'status_kurir'])->name('status_kurir');
Route::get('data_member', [adminController::class, 'data_member'])->name('data_member');
Route::post('simpan_admin', [adminController::class, 'simpan_admin'])->name('simpan_admin');
Route::post('edit_jasa', [adminController::class, 'edit_jasa'])->name('edit_jasa');
Route::post('delete_jasa', [adminController::class, 'delete_jasa'])->name('delete_jasa');
Route::post('delete_user_kasir', [adminController::class, 'delete_user_kasir'])->name('delete_user_kasir');
Route::post('delete_user_kurir', [adminController::class, 'delete_user_kurir'])->name('delete_user_kurir');
Route::post('simpan_jasa', [adminController::class, 'simpan_jasa'])->name('simpan_jasa');
Route::post('simpan_kasir', [adminController::class, 'simpan_kasir'])->name('simpan_kasir');
Route::post('simpan_kurir', [adminController::class, 'simpan_kurir'])->name('simpan_kurir');
Route::get('register_admin', [adminController::class, 'register_admin'])->name('register_admin');
Route::get('register_kasir', [adminController::class, 'register_kasir'])->name('register_kasir');
Route::get('register_kurir', [adminController::class, 'register_kurir'])->name('register_kurir');


Route::get('login_kasir', [kasirController::class, 'login_kasir'])->name('login_kasir');
Route::get('kasir_data', [kasirController::class, 'kasir_data'])->name('kasir_data');
Route::post('kasir', [kasirController::class, 'kasir'])->name('kasir');
Route::post('tugaskan', [kasirController::class, 'tugaskan'])->name('tugaskan');
Route::get('profile_kasir', [kasirController::class, 'profile_kasir'])->name('profile_kasir');
Route::post('edit_profile_kasir', [kasirController::class, 'edit_profile_kasir'])->name('edit_profile_kasir');

Route::get('login_kurir', [kurirController::class, 'login_kurir'])->name('login_kurir');
Route::post('kurir', [kurirController::class, 'kurir'])->name('kurir');
Route::get('profile_kurir', [kurirController::class, 'profile_kurir'])->name('profile_kurir');
Route::post('edit_profile_kurir', [kurirController::class, 'edit_profile_kurir'])->name('edit_profile_kurir');


// register member
Route::get('register', [registerController::class, 'register'])->name('register')->middleware('guest');
Route::post('registerProses', [registerController::class, 'registerProses'])->name('registerProses');

// login member
Route::get('login-member', [registerController::class, 'login'])->name('login')->middleware('guest');
Route::post('login-member-proses', [registerController::class, 'loginProses'])->name('loginProses');

// logout member
Route::get('logout', [registerController::class, 'logout'])->name('logout');

// logout user
Route::get('logout_user', [adminController::class, 'logout'])->name('logout_user');

// Autentikasi ketika user sudah login
Route::middleware(['auth:member'])->group(function () {
    Route::get('member/home', function () {
        return view('member.home');
    });
    Route::get('profile', [registerController::class, 'profile'])->name('profile');
    Route::post('edit_profile_member', [registerController::class, 'edit_profile_member'])->name('edit_profile_member');

    Route::get('transaksi', [registerController::class, 'transaksi'])->name('transaksi');
});
