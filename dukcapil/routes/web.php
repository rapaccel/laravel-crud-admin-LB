<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KIAController;
use App\Http\Controllers\EKtpController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AktaKelahiranController;
use App\Http\Controllers\KartuKeluargaController;

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
Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/', [LoginController::class, 'login'])->name('login.proses');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');
Route::middleware(['web','admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.index');
    Route::get('/e-ktp', [EKtpController::class,'index'])->name('e-ktp.index');
    Route::get('/kartu-keluarga', [KartuKeluargaController::class,'index'])->name('kartu-keluarga.index');
    Route::get('/kia', [KIAController::class,'index'])->name('kia.index');
    Route::get('/akta-kelahiran', [AktaKelahiranController::class,'index'])->name('akta-kelahiran.index');
    Route::get('/admin/data-scan/{id_pengajuan}', [ScanController::class,'getDetailWargaPesensi'])->name('scan.index');
    Route::post('/change-status/scan', [ScanController::class,'update'])->name('change-status.scan');
    Route::post('/change-status/ektp', [EKtpController::class,'update'])->name('change-status.ektp');
    Route::post('/change-status/kia', [KIAController::class,'update'])->name('change-status.kia');
    Route::post('/change-status/akta-kelahiran', [AktaKelahiranController::class,'update'])->name('change-status.akta-kelahiran');
    Route::post('/change-status/kartu-keluarga', [KartuKeluargaController::class,'update'])->name('change-status.kartu-keluarga');
    Route::get('/scan', function () {
        return view('admin.pelayanan.scan',[
            'page'=>'scan',
            'subpage'=>'scan',
            'title'=>'Kartu Keluarga'
        ]);
    });
});

