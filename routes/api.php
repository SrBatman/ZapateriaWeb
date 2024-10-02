<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductsController;

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



Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductsController::class ,'show'])->name('products.show');
Route::post('/products/{id}', [ProductsController::class ,'store'])->name('products.store');
Route::put('/products/{id}', [ProductsController::class , 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductsController::class,'destroy'])->name('products.destroy');