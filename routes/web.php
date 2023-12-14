<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\DetailController;

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

Route::get('/',[HomeController::class, 'index'])->name('fr.home');
Route::get('music/detail/{id}',[DetailController::class, 'index'])->name('fr.detail');
Route::get('download/{id}', [DetailController::class, 'download'])->name('fr.download.song');
// Route::get('download/song/{id}', [DetailController::class, 'downloadsong'])->name('fr.download.song');
