<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BakerController;
use App\Http\Controllers\BamasController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\ReportBMController;
use App\Http\Controllers\ReportBRController;
use App\Http\Controllers\ReportBKController;
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
    return redirect('/Beranda');
});

Route::get('/Beranda',function(){
    return view('Beranda');
})->name('Beranda');

Route::middleware(['auth'])->group(function(){
    Route::get('/Beranda',[AdminController::class,'index']);
    Route::get('/Beranda/admin',[AdminController::class,'admin'])->middleware('userAkses:admin');
    Route::get('/Beranda/user',[AdminController::class,'user'])->middleware('userAkses:user');
    Route::get('/logout',[UserController::class,'logout']);
});

Route::middleware(['auth'])->group(function(){

    //Beranda
    Route::get('/Beranda',[BerandaController::class,'index']);
    
    // Crud User
    Route::get('/User-Account',[CrudController::class,'index']);
    Route::post('/User-Account/store',[CrudController::class,'store']);
    Route::post('/User-Account/update/{id}',[CrudController::class,'update']);
    Route::get('/User-Account/destroy/{id}',[CrudController::class,'destroy']);

    // Crud Barang Masuk
    Route::get('/Barang-Masuk',[BamasController::class,'index']);
    Route::post('/Barang-Masuk/store',[BamasController::class,'store']);
    Route::get('/Barang-Masuk/filter',[BamasController::class,'filter']);
    Route::post('/Barang-Masuk/update/{id}',[BamasController::class,'update']);
    Route::get('/Barang-Masuk/destroy/{id}',[BamasController::class,'destroy']);
    Route::post('/Barang-Masuk/keluar/{id}',[BamasController::class,'keluar']);
    Route::post('/Barang-Masuk/return/{id}',[BamasController::class,'return']);

    // Crud Barang Keluar
    Route::get('/Barang-Keluar',[BakerController::class,'index']);
    Route::get('/Barang-Keluar/filter',[BakerController::class,'filter']);
    Route::get('/Barang-Keluar/destroy/{id}',[BakerController::class,'destroy']);

    // Crud Barang Return
    Route::get('/Barang-Return',[ReturnController::class,'index']);
    Route::get('/Barang-Return/filter',[ReturnController::class,'filter']);
    Route::post('/Barang-Return/update/{id}',[ReturnController::class,'update']);
    Route::get('/Barang-Return/destroy/{id}',[ReturnController::class,'destroy']);

    // Setting Profile
    Route::get('/profile',[CrudController::class,'profile']);
    Route::post('/profile/updateprofile/{id}',[CrudController::class,'updateprofile']);

    // Export Report Barang Masuk
    Route::get('/Report-Barang-Masuk',[ReportBMController::class,'index']);
    Route::get('/Report-Barang-Masuk/bmexport/{id}',[ReportBMController::class,'bmexport']);
    Route::post('/Report-Barang-Masuk/bmexport',[ReportBMController::class,'bmexport']);

    // Export Report Barang Keluar
    Route::get('/Report-Barang-Keluar',[ReportBKController::class,'index']);
    Route::post('/Report-Barang-Keluar/bkexport',[ReportBKController::class,'bkexport']);

    // Export Report Barang Return
    Route::get('/Report-Barang-Return',[ReportBRController::class,'index']);
    Route::post('/Report-Barang-Return/brexport',[ReportBRController::class,'brexport']);
});
