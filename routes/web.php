<?php

use App\Http\Controllers\Admin\BerandaController as AdminBerandaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\Admin\SlideGambarController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Web\BerandaController;
use App\Http\Controllers\Web\BeritaController as WebBeritaController;
use App\Http\Controllers\Web\KontakController;
use App\Http\Controllers\Web\PengaduanController as WebPengaduanController;
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
Route::group(['middleware' => 'auth'], function () {
 
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
 
});

Route::get('/',[BerandaController::class, 'index'])->name('beranda');
Route::get('/berita', [WebBeritaController::class, 'index'])->name('web.berita');
Route::get('/berita/{slug}', [WebBeritaController::class, 'show'])->name('web.slug.berita');
Route::get('/cari-berita', [WebBeritaController::class, 'search'])->name('berita.search');

Route::get('/kontak',[KontakController::class, 'index'])->name('web.kontak');
Route::post('/kontak/store',[KontakController::class, 'store'])->name('web.kontak.store');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin
Route::prefix('/admin')->group(function(){
    Route::get('/beranda', [AdminBerandaController::class, 'index'])->name('admin.beranda');    
    //pengaduan
    Route::resource('/pengaduan', PengaduanController::class);
    //Berita
    Route::resource('berita', BeritaController::class);
    //slide gambar
    Route::get('/slide-gambar', [SlideGambarController::class, 'index'])->name('slide.index');
    Route::post('/slide-gambar/store', [SlideGambarController::class, 'store'])->name('slide.store');
    Route::post('/slide-gambar/{id}', [SlideGambarController::class, 'destroy'])->name('slide.destroy');
    Route::post('/slide-gambar/{id}/update', [SlideGambarController::class, 'update'])->name('slide.update');
});
