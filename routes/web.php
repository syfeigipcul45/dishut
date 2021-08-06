<?php

use App\Http\Controllers\Admin\BerandaController as AdminBerandaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\BidangController;
use App\Http\Controllers\Admin\DataKehutananController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\SlideGambarController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Web\BerandaController;
use App\Http\Controllers\Web\BeritaController as WebBeritaController;
use App\Http\Controllers\Web\DataKehutananController as WebDataKehutananController;
use App\Http\Controllers\Web\KontakController;
use App\Http\Controllers\Web\MenuController;
use Illuminate\Support\Facades\Auth;
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
// Web
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'register']);
Route::group(['middleware' => 'auth'], function () {

    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/berita', [WebBeritaController::class, 'index'])->name('web.berita');
Route::get('/berita/{slug}', [WebBeritaController::class, 'show'])->name('web.slug.berita');
Route::get('/cari-berita', [WebBeritaController::class, 'search'])->name('berita.search');

Route::get('/kontak', [KontakController::class, 'index'])->name('web.kontak');
Route::post('/kontak/store', [KontakController::class, 'store'])->name('web.kontak.store');

Route::get('/profil/{slug}', [MenuController::class, 'show'])->name('web.slug.profil');
Route::get('/bidang/{slug}', [MenuController::class, 'show_bidang'])->name('web.slug.bidang');

Route::get('/file-kehutanan', [WebDataKehutananController::class, 'index'])->name('web.data-kehutanan');
Route::get('/data-kehutanan/pencarian', [WebDataKehutananController::class, 'searchByKategori'])->name('web.data-kehutanan.searchByKategori');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin
Route::prefix('/admin')->group(function () {
    Route::get('/beranda', [AdminBerandaController::class, 'index'])->name('admin.beranda');
    //pengaduan
    Route::resource('/pengaduan', PengaduanController::class);
    //Berita
    Route::resource('/berita', BeritaController::class);
    //slide gambar
    Route::get('/slide-gambar', [SlideGambarController::class, 'index'])->name('slide.index');
    Route::post('/slide-gambar/store', [SlideGambarController::class, 'store'])->name('slide.store');
    Route::post('/slide-gambar/{id}', [SlideGambarController::class, 'destroy'])->name('slide.destroy');
    Route::post('/slide-gambar/{id}/update', [SlideGambarController::class, 'update'])->name('slide.update');
    //profil
    Route::resource('/profil', ProfilController::class);
    //Bidang
    Route::resource('/bidang', BidangController::class);
    //Data Kehutanan
    Route::get('/data-kehutanan', [DataKehutananController::class, 'index'])->name('data-kehutanan.index');
    Route::post('/data-kehutanan/store', [DataKehutananController::class, 'store'])->name('data-kehutanan.store');
    Route::post('/data-kehutanan/{id}', [DataKehutananController::class, 'destroy'])->name('data-kehutanan.destroy');
    Route::post('/data-kehutanan/{id}/update', [DataKehutananController::class, 'update'])->name('data-kehutanan.update');
    Route::get('/data-kehutanan/{id}/show', [DataKehutananController::class, 'show'])->name('data-kehutanan.show');
    Route::get('/data-kehutanan/pencarian', [DataKehutananController::class, 'searchByKategori'])->name('data-kehutanan.searchByKategori');
    //Kategori Dokumen
    Route::resource('/kategori-dokumen', KategoriController::class);
});
