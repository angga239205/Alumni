<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\LamaranController;




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
Route::get('/admin', function (){
    return view('admin');
});

Route::get('/login', function (){
    return view('login');
})->middleware('auth');

Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'authenticating']);
Route::get('logout',[AuthController::class,'logout']);

Route::get('/landingpage', function (){
    return view('landingpage');


    Route::get('/', function () {
        return view('Auth/login');
    });
    
    Route::get('/landingpage', function () {
        return view('landingpage.index');
    });
    Route::get('/features', function () {
        return view('landingpage.features');
    });
    Route::get('/pricing', function () {
        return view('landingpage.pricing');
    });
    Route::get('/blog', function () {
        return view('landingpage.blog');
    });
    Route::get('/contact', function () {
        return view('landingpage.contact');
    });
    
    Route::get('/admin', function () {
        return view('admin');
    });


});
Route::get('alumni',[AlumniController::class,'show']);
Route::get('alumni/add',[AlumniController::class,'add']);
Route::post('alumni/create',[AlumniController::class,'create']);
Route::get('alumni/delete/{nis}',[AlumniController::class,'delete']);
Route::get('alumni/edit/{nis}',[AlumniController::class,'edit']);
Route::post('alumni/update/{nis}',[AlumniController::class,'update']);

Route::get('perusahaan',[PerusahaanController::class,'show']);
Route::get('perusahaan/add',[PerusahaanController::class,'add']);
Route::post('perusahaan/create',[PerusahaanController::class,'create']);
Route::get('perusahaan/delete/{id_perusahaan}',[PerusahaanController::class,'delete']);
Route::get('perusahaan/edit/{id_perusahaan}',[PerusahaanController::class,'edit']);
Route::post('perusahaan/update/{id_perusahaan}',[PerusahaanController::class,'update']);

Route::get('lowongan',[LowonganController::class,'show']);
Route::get('lowongan/add',[LowonganController::class,'add']);
Route::post('lowongan/create',[LowonganController::class,'create']);
Route::post('lowongan/delete/{id}',[LowonganController::class,'delete']);
Route::post('lowongan/edit/{id}',[LowonganController::class,'edit']);
Route::post('lowongan/update/{id}',[LowonganController::class,'update']);

Route::get('lamaran',[LamaranController::class,'show']);
Route::get('lamaran/add',[LamaranController::class,'add']);
Route::post('lamaran/create',[LamaranController::class,'create']);
Route::post('lamaran/delete/{id}',[LamaranController::class,'delete']);
Route::post('lamaran/edit/{id}',[LamaranController::class,'edit']);
Route::post('lamaran/update/{id}',[LamaranController::class,'update']);



Route::get('/admin', function (){
    return view('admin');
});