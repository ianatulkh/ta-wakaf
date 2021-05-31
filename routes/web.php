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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::name('admin.')->prefix('admin')->middleware(['auth', 'role:Admin', 'verified'])->group(
function(){
    Route::get('/', [HomeAdminController::class, 'index'])->name('home');    
    Route::resource('data-wakif', Admin\WakifController::class)->parameter('data-wakif', 'wakif');
});

Route::name('wakif.')->prefix('wakif')->middleware(['auth', 'role:wakif', 'verified'])->group(
function(){
    Route::get('/', [HomeWakifController::class, 'index'])->name('home');    
});
