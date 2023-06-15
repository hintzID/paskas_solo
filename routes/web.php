<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengurusLembagaController;
use App\Http\Controllers\CalonMitraController;
use App\Http\Controllers\AnakAsuhController;
use App\Http\Controllers\KondisiPondokController;
use App\Http\Controllers\HasilSurveyController;
use App\Http\Controllers\PondokController;
use App\Http\Controllers\KeteranganAnakAsuhController;
use App\Http\Controllers\FasilitasPondokController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\DonasiMasukController;
use App\Http\Controllers\TripPenyaluranDonasiController;

// Rute halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route pendaftaran Anggota (form anggota)
Route::get('anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('anggota', [AnggotaController::class, 'store'])->name('anggota.store');

// Rute otentikasi
Auth::routes();

// Rute untuk anggota
Route::middleware(['auth', 'member'])->group(function () {

        // Rute form Pimpinan Lembaga
        Route::get('pengurus_lembaga/create', [PengurusLembagaController::class, 'create'])->name('pengurus_lembaga.create');
        Route::post('pengurus_lembaga', [PengurusLembagaController::class, 'store'])->name('pengurus_lembaga.store');

        // Rute form Pimpinan Lembaga
        Route::get('calon_mitra/create', [CalonMitraController::class, 'create'])->name('calon_mitra.create');
        Route::post('calon_mitra', [CalonMitraController::class, 'store'])->name('calon_mitra.store');

         // Rute form Anak Asuh calon Mitra
         Route::get('anak_asuh/create', [AnakAsuhController::class, 'create'])->name('anak_asuh.create');
        Route::post('anak_asuh', [AnakAsuhController::class, 'store'])->name('anak_asuh.store');

         // Rute form kondisi pondok
        Route::get('kondisi_pondok/create', [KondisiPondokController::class, 'create'])->name('kondisi_pondok.create');
        Route::post('kondisi_pondok', [KondisiPondokController::class, 'store'])->name('kondisi_pondok.store');

         // Rute form hasil survey
         Route::get('hasil_survey/create', [HasilSurveyController::class, 'create'])->name('hasil_survey.create');
         Route::post('hasil_survey', [HasilSurveyController::class, 'store'])->name('hasil_survey.store');

});

// Rute untuk admin
Route::middleware(['auth', 'admin'])->group(function () {

    //Rute anggota
    Route::resource('anggota', AnggotaController::class)->except(['create', 'store']);
    
    //Rute User   
    Route::resource('user', UserController::class);

    //Rute Pimpinan Lembaga
    Route::resource('pengurus_lembaga', PengurusLembagaController::class)->except(['create', 'store']);
    
    //Route Calon Mitra Pondok
    Route::resource('calon_mitra', CalonMitraController::class)->except(['create', 'store']);

    //Route Anak Asuh Calon Pondok Mitra
    Route::resource('anak_asuh', AnakAsuhController::class)->except(['create', 'store']);

    //Route Kondisi Pondok
    Route::resource('kondisi_pondok', KondisiPondokController::class)->except(['create', 'store']);
    //Route Hasil Survey
    Route::resource('hasil_survey', HasilSurveyController::class)->except(['create', 'store']);
});

Route::resource('pondok', PondokController::class);
Route::resource('keterangan_anak_asuh', KeteranganAnakAsuhController::class);
Route::resource('fasilitas-pondok', FasilitasPondokController::class);
Route::resource('trip', TripController::class);
Route::resource('donasi_masuk', DonasiMasukController::class);
Route::resource('trip_penyaluran_donasi', TripPenyaluranDonasiController::class);