<?php

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
    return view('auth.register');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about',[App\Http\Controllers\HomeController::class, 'about']);
Route::get('/layout',[App\Http\Controllers\StudentController::class,'index']);
Route::get('/registration',[App\Http\Controllers\HomeController::class, 'register']);
Route::post('/forms',[App\Http\Controllers\StudentController::class, 'store']);
Route::get('/forms/create',[App\Http\Controllers\StudentController::class,'create']);