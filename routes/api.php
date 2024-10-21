<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\UserAuthController as UserAuth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware('auth:sanctum')->group(function () {
    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductsController::class ,'show'])->name('products.show');
    Route::post('/products', [ProductsController::class ,'store'])->name('products.store');
    Route::put('/products/{id}', [ProductsController::class , 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductsController::class,'destroy'])->name('products.destroy');
});

// Rutas de autenticación
Route::post('/register', [UserAuth::class, 'store']);
Route::post('/login', [UserAuth::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [UserAuth::class, 'logout']);