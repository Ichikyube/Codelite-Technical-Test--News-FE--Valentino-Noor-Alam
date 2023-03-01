<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
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


Route::view('/login','auth.login')->middleware('noAuth')->name('login');
Route::post('/getlogin',[AuthController::class,'getlogin'])->middleware('noAuth')->name('getlogin');
Route::post('/logout',[AuthController::class,'logout'])->middleware('withAuth')->name('auth.logout');
Route::view('change-password','auth.change-password')->middleware(['withAuth'])->name('changepassword');
Route::post('change-password','updatePassword')->middleware(['withAuth'])->name('updatepassword');
Route::prefix('news')->name('news.')->middleware(['withAuth'])->group(function () {
    Route::view('create','news.create')->name('create');
    Route::get('edit/{id}',[NewsController::class,'edit'])->name('edit');
    Route::post("/post", [NewsController::class,"store"])->name("post");
    Route::post("/update/{id}", [NewsController::class,"update"])->name("update");
    Route::get("/destroy/{id}", [NewsController::class,"destroy"])->name("destroy");
});

Route::get('/',[NewsController::class,'index'])->name('welcome');
