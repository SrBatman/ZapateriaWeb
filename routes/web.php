<?php

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/admins/list',[SessionsController::class,'index']);
Route::get('/admins/create', [SessionsController::class,'create']);
Route::post('/admins/save',[SessionsController::class,'save']);


Route::get('/products/list',[CookiesController::class,'index']);
Route::get('/products/create', [CookiesController::class,'create']);
Route::post('/products/save',[CookiesController::class,'save']);


Route::get('/providers/list',[EncryptionsController::class,'index']);
Route::get('/providers/create', [EncryptionsController::class,'create']);
Route::post('/providers/save',[EncryptionsController::class,'save']);