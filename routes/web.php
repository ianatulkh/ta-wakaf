<?php

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
    
    Route::resource('setujui-wakaf', Admin\SetujuiWakafController::class)
         ->parameter('setujui-wakaf', 'berkasWakif')
         ->only('index', 'update');

    Route::resource('tolak-wakaf', Admin\TolakWakafController::class)
         ->parameter('tolak-wakaf', 'berkasWakif')
         ->only('index');
    
    Route::resource('berkas-wakif', Admin\BerkasWakifController::class)
         ->parameter('berkas-wakif', 'berkasWakif')
         ->only('show');

    Route::resource('survey', Admin\DataWakaf\SurveyController::class)
         ->parameter('survey', 'berkasWakif')
         ->only('index', 'update');

     Route::resource('ikrar', Admin\DataWakaf\IkrarController::class)
         ->parameter('ikrar', 'berkasWakif')
         ->only('index', 'update');

     Route::resource('akta-ikrar', Admin\DataWakaf\AktaIkrarController::class)
         ->parameter('akta-ikrar', 'berkasWakif')
         ->only('index', 'update');
});

// BAGIAN KONTROL HAK AKSES, SEBAGAI WAKIF (YG MENDAFTAR)
Route::name('wakif.')->prefix('wakif')->middleware(['auth', 'role:wakif', 'verified'])->group(
function(){
    Route::get('/', [HomeWakifController::class, 'index'])
         ->name('home');    

    Route::resource('pengajuan-wakaf', Wakif\PengajuanWakafController::class)
         ->parameter('pengajuan-wakaf', 'berkasWakif');
});
