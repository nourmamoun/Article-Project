<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;


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

Route::get('/welcome',[PostController::class,'mainPage'] )->middleware('auth');
Route::get('/add',[PostController::class,'create'])->middleware('auth');;
Route::get('/welcome/{ID}/edit/{user_id}',[PostController::class,'edit'])->middleware('auth');;
Route::get('/welcome/{ID}',[PostController::class,'show'])-> where('ID','[0-9]+')->middleware('auth');;
Route::post('/welcome',[PostController::class,'store'])->middleware('auth');;
Route::PUT('/welcome/{ID}',[PostController::class,'update'])->middleware('auth');;
Route::DELETE('/welcome/{ID}/{user_id}',[PostController::class,'destroy'])->middleware('auth');;

//Route::resource("welcome",PostController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);
