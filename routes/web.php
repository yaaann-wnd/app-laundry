<?php

use App\Http\Controllers\registerController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\kasirController;
use App\Http\Controllers\kurirController;
use App\Http\Controllers\laundryController;
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

Route::get('/', [homeController::class, 'home'])->name('home');

Route::get('/login', function () {
    return view('autenticate/login');
});

// halaman ADMIN
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
Route::resource('laundry', laundryController::class);

// halaman KASIR
Route::get('login_kasir', [kasirController::class, 'login_kasir'])->name('login_kasir');
Route::get('kasir_data', [kasirController::class, 'kasir_data'])->name('kasir_data');
Route::get('proses_laundry', [kasirController::class, 'proses_laundry'])->name('proses_laundry');
Route::post('kasir', [kasirController::class, 'kasir'])->name('kasir');
Route::post('tugaskan', [kasirController::class, 'tugaskan'])->name('tugaskan');
Route::post('proses_order', [kasirController::class, 'proses_order'])->name('proses_order');
Route::get('profile_kasir', [kasirController::class, 'profile_kasir'])->name('profile_kasir');
Route::post('edit_profile_kasir', [kasirController::class, 'edit_profile_kasir'])->name('edit_profile_kasir');
Route::post('proses_laundry_kerja', [kasirController::class, 'proses_laundry_kerja'])->name('proses_laundry_kerja');
Route::post('proses_laundry_siap', [kasirController::class, 'proses_laundry_siap'])->name('proses_laundry_siap');
Route::get('transaksi_data_selesai', [kasirController::class, 'transaksi_data_selesai'])->name('transaksi_data_selesai');

// halaman KURIR
Route::get('login_kurir', [kurirController::class, 'login_kurir'])->name('login_kurir');
Route::post('kurir', [kurirController::class, 'kurir'])->name('kurir');
Route::get('profile_kurir', [kurirController::class, 'profile_kurir'])->name('profile_kurir');
Route::post('edit_profile_kurir', [kurirController::class, 'edit_profile_kurir'])->name('edit_profile_kurir');
Route::post('ambil', [kurirController::class, 'ambil'])->name('ambil');
Route::post('diambil', [kurirController::class, 'diambil'])->name('diambil');
Route::post('antri', [kurirController::class, 'antri'])->name('antri');
Route::post('diantar', [kurirController::class, 'diantar'])->name('diantar');
Route::post('selesai', [kurirController::class, 'selesai'])->name('selesai');
Route::post('aktif', [kurirController::class, 'aktif'])->name('aktif');
Route::post('nonaktif', [kurirController::class, 'nonaktif'])->name('nonaktif');
Route::post('status_kurir', [kurirController::class, 'status_kurir'])->name('status_kurir');
Route::post('transaksi_selesai', [kurirController::class, 'transaksi_selesai'])->name('transaksi_selesai');
Route::post('bayar_kurir', [kurirController::class, 'bayar_kurir'])->name('bayar_kurir');
Route::get('transaksi_data_selesai_kurir', [kurirController::class, 'transaksi_data_selesai_kurir'])->name('transaksi_data_selesai_kurir');
Route::post('detail_map', [kurirController::class, 'detail_map'])->name('detail_map');
Route::post('laundry_alamat', [kurirController::class, 'laundry_alamat'])->name('laundry_alamat');
Route::get('kurir_kasir', [kurirController::class, 'kurir_kasir'])->name('kurir_kasir');
Route::get('kurir_member', [kurirController::class, 'kurir_member'])->name('kurir_member');
Route::get('detail_transaksi_kurir', [kurirController::class, 'detail_transaksi_kurir'])->name('detail_transaksi_kurir');

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
    Route::get('member/home',[registerController::class, 'beranda'])->name('beranda');
    Route::get('transaksi', [registerController::class, 'transaksi'])->name('transaksi');
    Route::get('profile', [registerController::class, 'profile'])->name('profile');
    Route::get('/midtrans/{id}', [registerController::class, 'midtrans'])->name('midtrans');
    Route::post('edit_profile_member', [registerController::class, 'edit_profile_member'])->name('edit_profile_member');
    Route::post('data_jasa', [registerController::class, 'data_jasa'])->name('data_jasa');
    Route::post('order_member', [registerController::class, 'order_member'])->name('order_member');
    Route::post('success', [registerController::class, 'success'])->name('success');
    Route::post('pending', [registerController::class, 'pending'])->name('pending');
    Route::post('detail_transaksi', [registerController::class, 'detail_transaksi'])->name('detail_transaksi');
});
