<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\MovieController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\Admin\AdminController;

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



Auth::routes();
Route::get('/',[HomeController::class, 'index'])->name('home');
Route::get('posts',[PostController::class,'index'])->name('user.posts');
Route::get('posts/show/{slug}',[PostController::class, 'show'])->name('user.show');
Route::get('glide',[AdminController::class,'glide'])->name('glide');

/*


//Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/about',[HomeController::class, 'about']);
Route::get('/layout',[App\Http\Controllers\StudentController::class,'index']);
Route::get('/registration',[App\Http\Controllers\HomeController::class, 'register']);
Route::post('/store',[App\Http\Controllers\StudentController::class, 'store']);
//Route::get('/forms/create',[App\Http\Controllers\StudentController::class,'create']);
Route::get('admin.home',[App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('IsAdmin');
//Route::get('/create',[MovieController::class,'create']);
Route::post('/films',[MovieController::class,'store']);

// routes related to posts

*/
//Route::get('/',[HomeController::class, 'index'])->name('home');
//Route::group(['prefix' => 'user','middleware' => ['guest']], function(){
      //  Route::get('/',[HomeController::class, 'index'])->name('home');
  //      Route::get('posts',[PostController::class,'index'])->name('user.posts');
    //    Route::get('show/{slug}',[PostController::class, 'show'])->name('user.show');

      //   });




Route::group(['prefix' => 'admin'], function () {
      Route::group(['middleware' => ['guest.admin']], function () {
          Route::view('login', 'dashboard.admin.login')->name('admin.login');
          Route::post('login', [AdminController::class, 'login'])->name('admin.auth');
      });
      
      Route::group(['middleware' => ['admin.auth']], function () {
          Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
          Route::get('create',[AdminController::class, 'create'])->name('admin.create');
          Route::post('store',[AdminController::class, 'store'])->name('admin.store');
          Route::get('edit/{slug}',[AdminController::class,'edit'])->name('admin.edit');
          Route::get('show/{slug}',[AdminController::class,'show']);
          Route::put('update/{slug}',[AdminController::class, 'update'])->name('admin.update');
          Route::delete('delete/{slug}',[AdminController::class, 'destroy']);
          Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
      });
  });


  // temporary test code

Route::prefix('test')->group(function () {
    Route::get('family',[FamilyController::class,'index'])->name('test.family');
    
});


