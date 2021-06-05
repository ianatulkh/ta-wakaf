<?php

use App\Http\Controllers\HomeAdminController;
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

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('profile', ProfileController::class)->parameter('profile', 'user');

Route::name('admin.')->prefix('admin')->middleware(['auth', 'role:Admin', 'verified'])->group(
function(){
    Route::get('/', [HomeAdminController::class, 'index'])->name('home');    
    Route::resource('data-wakif', Admin\WakifController::class)->parameter('data-wakif', 'wakif');
});

Route::name('wakif.')->prefix('wakif')->middleware(['auth', 'role:wakif', 'verified'])->group(
function(){
    Route::get('/', [HomeWakifController::class, 'index'])->name('home');    
    Route::resource('pengajuan-wakaf', Wakif\PengajuanWakafController::class)->parameter('pengajuan-wakaf', 'berkasWakif');
});
