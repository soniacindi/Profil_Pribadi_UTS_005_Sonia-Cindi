<?php

use Illuminate\Support\Facades\Route;
use App\Http\livewire\Biodata;
use App\Http\livewire\Pengalamen;
use App\Http\livewire\Pendidikan;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::prefix('/admin')->group(function(){
  Route::get('tabel-biodata', Biodata::class)->name('admin.biodata');
});

Route::prefix('/admin')->group(function(){
  Route::get('tabel-pengalamen', Pengalamen::class)->name('admin.pengalamen');
});

Route::prefix('/admin')->group(function(){
  Route::get('tabel-pendidikan', Pendidikan::class)->name('admin.pendidikan');
});