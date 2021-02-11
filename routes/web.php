<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\master\AgenController;
use App\Http\Controllers\master\DaerahController;
use App\Http\Controllers\master\CheckListKendaraanController;
use App\Http\Controllers\master\DetailCheckListKendaraanController;
use App\Http\Controllers\master\DetailTrayekController;
use App\Http\Controllers\master\JadwalController;
use App\Http\Controllers\master\JenisKendaraanController;
use App\Http\Controllers\master\KaryawanController;
use App\Http\Controllers\master\KategoriKendaraanController;
use App\Http\Controllers\master\KendaraanController;
use App\Http\Controllers\master\LayoutController;
use App\Http\Controllers\master\TrayekController;
use App\Http\Controllers\master\UserController;
use App\Http\Controllers\PengecekanKendaraanController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SPJController;

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



// Route::get('/', [LoginController::class, 'dashboard'])->name('general.login');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'actLogin'])->name('act.login');

Route::middleware(['general'])->group(function () {
    Route::prefix('daerah')->group(function () {
        Route::get('/', [DaerahController::class, 'index'])->name('daerah.all');
        Route::get('/create', [DaerahController::class, 'show'])->name('daerah.create.form');
        Route::get('/show', [DaerahController::class, 'show'])->name('daerah.show');
        Route::post('/create', [DaerahController::class, 'actCreate'])->name('daerah.create');
        Route::put('/update', [DaerahController::class, 'actUpdate'])->name('daerah.update');
        Route::delete('/delete', [DaerahController::class, 'actDelete'])->name('daerah.delete');
    });

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'actLogout'])->name('act.logout');


    // Route::prefix('daerah')->group(function () {
    //     Route::get('/', [DaerahController::class, 'index'])->name('daerah.all');
    //     Route::get('/create', [DaerahController::class, 'show'])->name('daerah.create.form');
    //     Route::get('/show', [DaerahController::class, 'show'])->name('daerah.show');
    //     Route::post('/create', [DaerahController::class, 'actCreate'])->name('daerah.create');
    //     Route::put('/update', [DaerahController::class, 'actUpdate'])->name('daerah.update');
    //     Route::delete('/delete', [DaerahController::class, 'actDelete'])->name('daerah.delete');
    // });

    Route::prefix('agen')->group(function () {
        Route::get('/', [AgenController::class, 'index'])->name('agen.all');
        Route::get('/create', [AgenController::class, 'show'])->name('agen.create.form');
        Route::get('/show', [AgenController::class, 'show'])->name('agen.show');
        Route::post('/create', [AgenController::class, 'actCreate'])->name('agen.create');
        Route::put('/update', [AgenController::class, 'actUpdate'])->name('agen.update');
        Route::delete('/delete', [AgenController::class, 'actDelete'])->name('agen.delete');
    });



    Route::prefix('karyawan')->group(function () {
        Route::get('/', [KaryawanController::class, 'index'])->name('karyawan.all');
        Route::get('/create', [KaryawanController::class, 'show'])->name('karyawan.create.form');
        Route::get('/show', [KaryawanController::class, 'show'])->name('karyawan.show');
        Route::post('/create', [KaryawanController::class, 'actCreate'])->name('karyawan.create');
        Route::put('/update', [KaryawanController::class, 'actUpdate'])->name('karyawan.update');
        Route::delete('/delete', [KaryawanController::class, 'actDelete'])->name('karyawan.delete');
        Route::prefix('user')->group(function () {
            Route::get('/create', [UserController::class, 'show'])->name('user.create.form');
            Route::post('/create', [UserController::class, 'actCreate'])->name('user.create');
            Route::delete('/delete', [UserController::class, 'actDelete'])->name('user.delete');
        });
    });

    Route::prefix('trayek')->group(function () {
        Route::get('/', [TrayekController::class, 'index'])->name('trayek.all');
        Route::get('/create', [TrayekController::class, 'show'])->name('trayek.create.form');
        Route::get('/show', [TrayekController::class, 'show'])->name('trayek.show');
        Route::post('/create', [TrayekController::class, 'actCreate'])->name('trayek.create');
        Route::put('/update', [TrayekController::class, 'actUpdate'])->name('trayek.update');
        Route::delete('/delete', [TrayekController::class, 'actDelete'])->name('trayek.delete');
        Route::prefix('/detail')->group(function () {
            Route::post('/create', [DetailTrayekController::class, 'actCreate'])->name('trayek.detail.create');
            Route::delete('/delete', [DetailTrayekController::class, 'actDelete'])->name('trayek.detail.delete');
        });
    });

    Route::prefix('layout')->group(function () {
        Route::get('/', [LayoutController::class, 'index'])->name('layout.all');
        Route::get('/create', [LayoutController::class, 'show'])->name('layout.create.form');
        Route::get('/show', [LayoutController::class, 'show'])->name('layout.show');
        Route::post('/create', [LayoutController::class, 'actCreate'])->name('layout.create');
        Route::put('/update', [LayoutController::class, 'actUpdate'])->name('layout.update');
        Route::delete('/delete', [LayoutController::class, 'actDelete'])->name('layout.delete');
    });

    Route::prefix('jeniskendaraan')->group(function () {
        Route::get('/', [JenisKendaraanController::class, 'index'])->name('jeniskendaraan.all');
        Route::get('/create', [JenisKendaraanController::class, 'show'])->name('jeniskendaraan.create.form');
        Route::get('/show', [JenisKendaraanController::class, 'show'])->name('jeniskendaraan.show');
        Route::post('/create', [JenisKendaraanController::class, 'actCreate'])->name('jeniskendaraan.create');
        Route::put('/update', [JenisKendaraanController::class, 'actUpdate'])->name('jeniskendaraan.update');
        Route::delete('/delete', [JenisKendaraanController::class, 'actDelete'])->name('jeniskendaraan.delete');
    });

    Route::prefix('kategorikendaraan')->group(function () {
        Route::get('/', [KategoriKendaraanController::class, 'index'])->name('kategorikendaraan.all');
        Route::get('/create', [KategoriKendaraanController::class, 'show'])->name('kategorikendaraan.create.form');
        Route::get('/show', [KategoriKendaraanController::class, 'show'])->name('kategorikendaraan.show');
        Route::post('/create', [KategoriKendaraanController::class, 'actCreate'])->name('kategorikendaraan.create');
        Route::put('/update', [KategoriKendaraanController::class, 'actUpdate'])->name('kategorikendaraan.update');
        Route::delete('/delete', [KategoriKendaraanController::class, 'actDelete'])->name('kategorikendaraan.delete');
    });


    Route::prefix('kendaraan')->group(function () {
        Route::get('/', [KendaraanController::class, 'index'])->name('kendaraan.all');
        Route::get('/create', [KendaraanController::class, 'show'])->name('kendaraan.create.form');
        Route::get('/show', [KendaraanController::class, 'show'])->name('kendaraan.show');
        Route::post('/create', [KendaraanController::class, 'actCreate'])->name('kendaraan.create');
        Route::put('/update', [KendaraanController::class, 'actUpdate'])->name('kendaraan.update');
        Route::delete('/delete', [KendaraanController::class, 'actDelete'])->name('kendaraan.delete');
    });



    Route::prefix('checklist')->group(function () {
        Route::get('/', [CheckListKendaraanController::class, 'index'])->name('checklist.all');
        Route::get('/create', [CheckListKendaraanController::class, 'show'])->name('checklist.create.form');
        Route::get('/show', [CheckListKendaraanController::class, 'show'])->name('checklist.show');
        Route::post('/create', [CheckListKendaraanController::class, 'actCreate'])->name('checklist.create');
        Route::put('/update', [CheckListKendaraanController::class, 'actUpdate'])->name('checklist.update');
        Route::delete('/delete', [CheckListKendaraanController::class, 'actDelete'])->name('checklist.delete');
        Route::prefix('detail')->group(function () {
            Route::post('/create', [DetailCheckListKendaraanController::class, 'actCreate'])->name('checklist.detail.create');
            Route::delete('/delete', [DetailCheckListKendaraanController::class, 'actDelete'])->name('checklist.detail.delete');
        });
    });
    Route::prefix('jadwal')->group(function () {
        Route::get('/', [JadwalController::class, 'index'])->name('jadwal.all');
        Route::get('/create', [JadwalController::class, 'show'])->name('jadwal.create.form');
        Route::get('/show', [JadwalController::class, 'show'])->name('jadwal.show');
        Route::post('/create', [JadwalController::class, 'actCreate'])->name('jadwal.create');
        Route::put('/update', [JadwalController::class, 'actUpdate'])->name('jadwal.update');
        Route::delete('/delete', [JadwalController::class, 'actDelete'])->name('jadwal.delete');
    });

    Route::get('/spj/index', [SPJController::class, 'index'])->name('spj.index');
    Route::get('/spj/create', [SPJController::class, 'show'])->name('spj.create');
    Route::post('/spj/create', [SPJController::class, 'actCreate'])->name('spj.actCreate');
    Route::get('/spj/{kodespj}/show', [SPJController::class, 'showDetail'])->name('spj.show.detail');
    Route::get('/spj/{kodespj}/penumpang/checkin', [SPJController::class, 'checkin'])->name('spj.checkin');
    Route::post('/spj/{kodespj}/penumpang/checkin', [SPJController::class, 'actCheckin'])->name('spj.actCheckin');
    Route::get('/spj/penumpang/checkout', [SPJController::class, 'checkout'])->name('spj.checkout');
    Route::get('/spj/konfirmasi', [SPJController::class, 'konfirmasi'])->name('spj.konfirmasi');
    Route::post('/spj/konfirmasi', [SPJController::class, 'actKonfirmasi'])->name('spj.actKonfirmasi');
    Route::get('/pengecekan_kendaraan', [PengecekanKendaraanController::class, 'index'])->name('pengecekan.kendaraan');

    Route::prefix('search')->group(function () {
        // Route::get('/daerah', [SearchController::class, 'daerah'])->name('search.daerah');
        Route::post('/daerah', [SearchController::class, 'daerah'])->name('search.actDaerah');
        Route::post('/agen', [SearchController::class, 'agen'])->name('search.actAgen');
        Route::post('/layout', [SearchController::class, 'layout'])->name('search.actLayout');
        Route::post('/jenis_kendaraan', [SearchController::class, 'jenisKendaraan'])->name('search.actJenisKendaraan');
        Route::post('/check_list', [SearchController::class, 'checkList'])->name('search.actCheckList');
        Route::post('/trayek', [SearchController::class, 'trayek'])->name('search.actTrayek');
        Route::post('/kategori_kendaraan', [SearchController::class, 'kategoriKendaraan'])->name('search.actKategoriKendaraan');
    });
});
