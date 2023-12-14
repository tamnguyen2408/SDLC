<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SongController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\SingerController;
use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\DownloadController;


Route::group(["prefix"=> "admin","as"=>"admin."], function () {
    //http://localhost:8000/login
    Route::get("login",[LoginController::class,"index"])->name("login");

    // http://localhost:8000/handle-login
    Route::post("handle-login",[LoginController::class,"login"])->name("handle.login");

    Route::post('logout',[LoginController::class,"logout"])->name("logout");
});
Route::group(["prefix"=> "user","as"=>"user."], function () {

    Route::get("login",[UserLoginController::class,"index"])->name("login");
    Route::post("handle-login",[UserLoginController::class,"login"])->name("handle.login");
    Route::get("download",[DownloadController::class,"index"])->name("index");
    Route::get('download/{id}', [DownloadController::class, 'download'])->name('download');


});

Route::group(["middleware" => ["check.admin.login"],"prefix"=> "admin", "as" => "admin."], function(){
    Route::get("dashboard",[DashboardController::class, "index"])->name("dashboard");

    // songs
    Route::get("songs",[SongController::class, "index"])->name("song");

    Route::get("add-song", [SongController::class, "create"])->name("song.add");
    Route::post("handle-add-song",[SongController::class,"handleCreate"])->name("song.handle.add");

    Route::get('edit-song/{id}',[SongController::class, 'edit'])->name('song.edit');
    Route::post('handle-edit/{id}',[SongController::class, 'handleEdit'])->name('handle.edit');
    Route::post('delete-song/{id}',[SongController::class, 'delete'])->name('song.delete');

    // singer
    Route::get("singers",[SingerController::class, "index"])->name("singer");
    Route::get("add-singer",[SingerController::class, "create"])->name("singer.add");
    Route::post("handle-add-singer",[SingerController::class,"handleCreate"])->name("singer.handle.add");

    
    Route::get('edit-singer/{id}',[SIngerController::class, 'edit'])->name('singer.edit');
    Route::post('handle-edit/{id}',[SIngerController::class, 'handleEdit'])->name('handle.edit');
    Route::post('delete-singer/{id}',[SIngerController::class, 'delete'])->name('singer.delete');

    
});
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get("search", [HomeController::class, 'searchsong'])->name('search');
// Route::get("index", [HomeController::class, 'download'])->name('download');

// Route::get("download", [HomeController::class, 'downloadsong'])->name('download');
// Route::get("details/{id}", [HomeController::class, 'viewsong'])->name('details');
