<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('beranda');
});

Auth::routes();

// Halaman home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Halaman beranda
Route::resource('beranda', BerandaController::class);

// Grup untuk middleware auth
Route::middleware(['auth'])->group(function () {
    // Halaman menu
    Route::resource('menu', MenuController::class);

    // Hapus data menu
    Route::get('hapusMenu/{id}', [MenuController::class, 'destroy']);

    // Halaman kategori
    Route::resource('kategori', KategoriController::class);

    // Hapus data kategori
    Route::get('hapusKategori/{id}', [KategoriController::class, 'destroy']);

    // Halaman user
    Route::resource('user', UserController::class)->middleware('admin');

    // Hapus data user
    Route::get('hapusUser/{id}', [UserController::class, 'destroy'])->middleware('admin');

    // Halaman dashboard
    Route::resource('dashboard', DashboardController::class);
});