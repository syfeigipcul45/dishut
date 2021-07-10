<?php

use App\Http\Controllers\Admin\BerandaController as AdminBerandaController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Web\BerandaController;
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

Route::get('/',[BerandaController::class, 'index'])->name('beranda');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin
Route::prefix('/admin')->group(function(){
    Route::get('/beranda', [AdminBerandaController::class, 'index'])->name('admin.beranda');
    //Berita
    Route::resource('berita', BeritaController::class);
});
