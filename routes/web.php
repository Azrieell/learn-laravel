<?php

use App\Http\Controllers\GuruAccessController;
use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;

use GuzzleHttp\Middleware;


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
//crud jurusan
Route::get('/jurusan', [JurusanController::class, 'index']);
Route::get('/jurusan/tambah', [JurusanController::class, 'create']);
Route::post('/jurusan/store', [JurusanController::class, 'store']);
Route::get('/jurusan/show/{id}', [JurusanController::class, 'show']);
Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit']);
Route::put('/jurusan/update/{id}', [JurusanController::class, 'update']);
Route::delete('/jurusan/delete/{id}', [JurusanController::class, 'destroy']);

//crud siswa
Route::resource('siswa',SiswaController::class)->middleware('siswa');
Route::get('/siswa', [SiswaController::class, 'index'])->middleware('siswa');
Route::get('/tambah', [SiswaController::class, 'create'])->middleware('siswa');
Route::post('/siswa/store', [SiswaController::class, 'store'])->middleware('siswa');
Route::get('/edit/{id}', [SiswaController::class, 'edit'])->middleware('siswa');
Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->middleware('siswa');
Route::get('/show/{id}', [SiswaController::class, 'show'])->middleware('siswa');
Route::delete('/siswa/delete/{id}', [SiswaController::class, 'destroy'])->middleware('siswa');

//crud guru
Route::get('/guru', [GuruController::class, 'index'])->middleware('guru');
Route::get('/guru/tambah', [GuruController::class, 'create']);
Route::post('/guru/tambah/store', [GuruController::class,'store']);

//auth guru
Route::get('/login/guru', [GuruAccessController::class, 'index']);
Route::post('/login/guru/post', [GuruAccessController::class, 'postLogin']);
Route::get('/register/guru', [GuruAccessController::class, 'register']);
Route::post('/register/guru', [GuruAccessController::class, 'postRegister'])->name('guru.register');

//import data siswa in excel to database
Route::get('/import/siswa', [SiswaController::class, 'import']);
Route::post('/import/siswa', [SiswaController::class, 'importExcelData']);


Route::get('/', function () {
    return view('welcome');
});
Route::get('/contact', function () {
    return view('contact');
});
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
