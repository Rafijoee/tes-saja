<?php

use App\Http\Controllers\C_JenisEdukasi;
use App\Http\Controllers\MateriEdukasiController;
use App\Http\Controllers\SubMateriEdukasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaEdukasi;
use App\Http\Controllers\pemerintahEdukasiController;
use Illuminate\Support\Facades\Route;
use App\Models\M_JenisEdukasi;
use App\Models\MateriEdukasi;

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
// admin
Route::put('admin/edukasi/materi/{id}', [MateriEdukasiController::class, 'update'])->name('admin.materi.edit');
Route::group(['prefix' => 'admin',  'as' => 'admin.'], function () {
    Route::group(['prefix' => 'edukasi', 'as' => 'edukasi.'], function () {
        Route::post('jenis-edukasi', [C_JenisEdukasi::class, 'store'])->name('jenis.store');
        Route::post('materi-edukasi', [MateriEdukasiController::class, 'store'])->name('materi.store');
        Route::post('subMateri', [SubMateriEdukasiController::class,'store'])->name('sub');
        Route::get('{id}', [MateriEdukasiController::class, 'index'])->name('materi.index');
        Route::get('{materi_id}/{sub_id}', [MateriEdukasiController::class, 'show'])->name('materi.show');         
        Route::put('{id}/update', [SubMateriEdukasiController::class, 'update'])->name('sub.edit');
        Route::get('/',[C_JenisEdukasi::class, 'index'])->name('index')->middleware('admin');

        // Route::post('materi-edukasi',[MateriEdukasiController::class, 'store'])->name('materi.store');
        // Route::resource('materi-edukasi', 'MateriEdukasi');        
        Route::resource('sub-materi-edukasi', 'SubMateriEdukasi');        

    });
    Route::group(['prefix' => 'konsultasi', 'as' => 'konsultasi.'], function () {
        Route::get('/', function() {return view('admin.konsultasi');})->name('index');
        
    });
});

Route::group(['prefix' => 'pemerintah' ,'as' =>'pemerintah.'],function (){
    Route::group(['prefix'=> 'edukasi','as'=> 'edukasi.'], function () {
        Route::get('/', [pemerintahEdukasiController::class, 'index'])->name('index');
        Route::get('{id}', [pemerintahEdukasiController::class, 'materi'])->name('materi.index');
        Route::get('{materi_id}/{sub_id}', [pemerintahEdukasiController::class, 'show'])->name('materi.show');
        Route::post('ulasan/{id}', [pemerintahEdukasiController::class, 'ulasan'])->name('ulasan');
        Route::post('rating/{id}', [pemerintahEdukasiController::class, 'rating'])->name('rating');
        Route::post('materi-edukasi', [pemerintahEdukasiController::class, 'store'])->name('materi.store');
        Route::post('subMateri', [pemerintahEdukasiController::class,'subMateri'])->name('sub');
    });
});

Route::group(['prefix'=> 'pengguna','as'=> 'pengguna.'], function () {
    Route::group(['prefix'=> 'edukasi','as'=> 'edukasi.'], function () {
        Route::get('/', [PenggunaEdukasi::class, 'index'])->name('index');
        Route::get('{id}', [PenggunaEdukasi::class, 'materi'])->name('materi.index');
        Route::get('{materi_id}/{sub_id}', [PenggunaEdukasi::class, 'show'])->name('materi.show');
        Route::post('ulasan/{id}', [PenggunaEdukasi::class, 'ulasan'])->name('ulasan');
        Route::post('rating/{id}', [PenggunaEdukasi::class, 'rating'])->name('rating');

        
    });
});

//Route Public
Route::get('/', function () {return view('landing-page');});


//Route Login
Route::get('/login-page', function () {return view('login-page');});
Route::post('/login-page',[LoginController::class, 'login']);
// Route::get('/test',[C_JenisEdukasi::class, 'index']);

//Route Edukasi
Route::post('/fitur-edukasi-admin', [C_JenisEdukasi::class, 'store'])->name('judulEdu.store');


Route::get('/register-page', function () {
    return view('register-page');
});

//Route User
Route::get('/profil-user', function () {
    return view('user.profil-user');
});

Route::get('/fitur-edukasi-user', function () {
    return view('user.fitur-edukasi-user');
});

//Route Gov
Route::get('/profil-gov', function () {
    return view('gov.profil-gov');
});

Route::get('/dashboard-modul-gov', function () {
    return view('gov.dashboard-modul-gov');
});

Route::get('/fitur-edukasi-gov', function () {
    return view('gov.fitur-edukasi-gov');
});

//Route Admin
Route::get('/profil-admin', function () {
    return view('admin.profil-admin');
});

Route::get('/melihat-user', function () {
    return view('admin.melihat-user');
});

Route::get('/melihat-gov', function () {
    return view('admin.melihat-gov');
});

Route::get('/dashboard-modul-admin', function () {
    return view('admin.dashboard-modul-admin');
});

Route::get('/fitur-edukasi-admin', function () {
    $jenis = M_JenisEdukasi::all();
    return view('admin.edukasi.list',compact('jenis'));
});

