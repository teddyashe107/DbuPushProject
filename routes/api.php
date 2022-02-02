<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('/login',  [LoginController::class, 'login']);
Route::post('/register',[RegisterController::class, 'register']);
Route::get('user',  [UserController::class, 'index']);
Route::get('user/{$id}',[UserController::class,'show']);
Route::delete('delete',[UserController::class,'destroy']);
Route::put('user/{$id}',[UserController::class,'update']);
Route::middleware('auth:api')->get('/student',  [UserController::class, 'index']);




















//Route::get('users', [UserController::class, 'users']);