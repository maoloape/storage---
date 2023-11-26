<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BakerController;
use App\Http\Controllers\BamasController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function(){
    Route::get('/',[UserController::class,'index'])->name('login');
    Route::post('/',[UserController::class,'login']);
});

Route::get('/home',function(){
    return redirect('/admin');
});

Route::get('/beranda',function(){
    return view('beranda');
})->name('beranda');

Route::middleware(['auth'])->group(function(){
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin/admin',[AdminController::class,'admin'])->middleware('userAkses:admin');
    Route::get('/admin/user',[AdminController::class,'user'])->middleware('userAkses:user');
    Route::get('/logout',[UserController::class,'logout']);
});

Route::middleware(['auth'])->group(function(){
    
    // Crud User
    Route::get('/crud',[CrudController::class,'index']);
    Route::post('/crud/store',[CrudController::class,'store']);
    Route::post('/crud/update/{id}',[CrudController::class,'update']);
    Route::get('/crud/destroy/{id}',[CrudController::class,'destroy']);

    // Crud Barang Masuk
    Route::get('/bm',[BamasController::class,'index']);
    Route::post('/bm/store',[BamasController::class,'store']);
    Route::post('/bm/update/{id}',[BamasController::class,'update']);
    Route::get('/bm/destroy/{id}',[BamasController::class,'destroy']);

    // Crud Barang Keluar
    Route::get('/bk',[BakerController::class,'index']);
    Route::post('/bk/store',[BakerController::class,'store']);
    // Route::post('/bk/update/{id}',[BamasController::class,'update']);
    Route::get('/bk/destroy/{id}',[BakerController::class,'destroy']);

    // Crud Barang Return
    Route::get('/br',[ReturnController::class,'index']);
    Route::post('/br/store',[ReturnController::class,'store']);
    // Route::post('/bk/update/{id}',[ReturnController::class,'update']);
    Route::get('/br/destroy/{id}',[ReturnController::class,'destroy']);
});




