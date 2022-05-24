<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriSuratController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\StatusController;

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
    return view('welcome');
});

Route::resource('kategori_surats', KategoriSuratController::class)->middleware('checkRole:admin');
Route::resource('surats', SuratController::class)->middleware('checkRole:mahasiswa');
Route::resource('status', StatusController::class)->middleware('checkRole:admin');

Route::get('/daftar_akun', function() {
    return view('roles.crud-register');
})->name('daftar.akun')->middleware('checkRole:admin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/import-akun-mahasiswa', [App\Http\Controllers\UserController::class, 'import']);
