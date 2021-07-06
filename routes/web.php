<?php

use App\BerkasWakif;
use App\Http\Controllers\Admin\BerkasWakifController;
use App\Http\Controllers\Admin\CetakAktaIkrarController;
use App\Http\Controllers\Admin\DataWakaf\AktaIkrarController;
use App\Http\Controllers\Admin\SaksiController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeWakifController;
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

Auth::routes(['verify' => true]);

// BAGIAN DEPAN HOMEPAGE
Route::get('/', [HomeController::class, 'welcome'])
     ->name('welcome');

Route::get('/persyaratan', [HomeController::class, 'persyaratan'])
     ->name('persyaratan');

// BAGIAN UNTUK REDIRECT KE DASHBOARD USER
Route::get('/home', [HomeController::class, 'index'])
     ->middleware('auth')
     ->name('home');

// BAGIAN EDIT PROFILE BAIK ITU WAKIF / USER
Route::resource('profile', ProfileController::class)
     ->middleware('auth')
     ->parameter('profile', 'user');

// BAGIAN KONTROL HAK AKSES, SEBAGAI ADMIN
Route::name('admin.')->prefix('admin')->middleware(['auth', 'role:Admin', 'verified'])->group(
function(){
    Route::get('/', [HomeAdminController::class, 'index'])
         ->name('home');    

    Route::resource('data-wakif', Admin\WakifController::class)
         ->parameter('data-wakif', 'wakif');

    Route::resource('data-saksi', Admin\SaksiController::class)
         ->parameter('data-saksi', 'saksi');

    Route::get('data-saksi/get-saksi/fetch', [BerkasWakifController::class, 'getSaksi'])
         ->name('get-saksi.fetch');

    Route::resource('data-nadzir', Admin\NadzirController::class)
         ->parameter('data-nadzir', 'nadzir');

    Route::get('data-nadzir/get-nadzir/fetch', [BerkasWakifController::class, 'getNadzir'])
         ->name('get-nadzir.fetch');
    
     // RUTE UNTUK MENU TERKAIT STATUS PENGAJUAN WAKAF
    Route::resource('setujui-wakaf', Admin\SetujuiWakafController::class)
         ->parameter('setujui-wakaf', 'berkasWakif')
         ->only('index', 'update');

    Route::resource('tolak-wakaf', Admin\TolakWakafController::class)
         ->parameter('tolak-wakaf', 'berkasWakif')
         ->only('index');

    Route::resource('survey', Admin\DataWakaf\SurveyController::class)
         ->parameter('survey', 'berkasWakif')
         ->only('index', 'update');

     Route::resource('ikrar', Admin\DataWakaf\IkrarController::class)
         ->parameter('ikrar', 'berkasWakif')
         ->only('index', 'update');

     Route::resource('akta-ikrar', Admin\DataWakaf\AktaIkrarController::class)
         ->parameter('akta-ikrar', 'berkasWakif')
         ->only('index', 'update', 'show');

     // HALAMAN FORMULIR UPDATE UNTUK CETAK AKTA IKRAR
     Route::resource('cetak-akta-ikrar', Admin\CetakAktaIkrarController::class)
         ->parameter('cetak-akta-ikrar', 'aktaIkrar')
         ->only('store', 'update');

     // CETAK DOKUMEN AKTA IKRAR
     Route::get('cetak-akta-ikrar-wt1/{berkasWakif}', [CetakAktaIkrarController::class, 'cetak_wt1'])
         ->name('cetakWt1');
     
     Route::get('cetak-akta-ikrar-wt2/{berkasWakif}', [CetakAktaIkrarController::class, 'cetak_wt2'])
         ->name('cetakWt2');

     Route::get('cetak-akta-ikrar-wt2a/{berkasWakif}', [CetakAktaIkrarController::class, 'cetak_wt2a'])
         ->name('cetakWt2a');

     Route::get('cetak-akta-ikrar-wt3/{berkasWakif}', [CetakAktaIkrarController::class, 'cetak_wt3'])
         ->name('cetakWt3');

     Route::get('cetak-akta-ikrar-wt3a/{berkasWakif}', [CetakAktaIkrarController::class, 'cetak_wt3a'])
         ->name('cetakWt3a');

     Route::get('cetak-akta-ikrar-wt4/{berkasWakif}', [CetakAktaIkrarController::class, 'cetak_wt4'])
         ->name('cetakWt4');

     Route::get('cetak-akta-ikrar-wt4a/{berkasWakif}', [CetakAktaIkrarController::class, 'cetak_wt4a'])
         ->name('cetakWt4a');

     Route::get('cetak-akta-ikrar-wtk/{berkasWakif}', [CetakAktaIkrarController::class, 'cetak_wtk'])
         ->name('cetakWtk');

     // DETAIL BERKAS WAKIF UNTUK SEMUA
     Route::resource('berkas-wakif', Admin\BerkasWakifController::class)
         ->parameter('berkas-wakif', 'berkasWakif')
         ->only('show');
});

// BAGIAN KONTROL HAK AKSES, SEBAGAI WAKIF (YG MENDAFTAR)
Route::name('wakif.')->prefix('wakif')->middleware(['auth', 'role:wakif', 'verified'])->group(
function(){
    Route::get('/', [HomeWakifController::class, 'index'])
         ->name('home');    

    Route::resource('pengajuan-wakaf', Wakif\PengajuanWakafController::class)
         ->parameter('pengajuan-wakaf', 'berkasWakif');
});
