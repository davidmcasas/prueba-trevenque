<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/products', [\App\Http\Controllers\ProductController::class, 'api_get'])->name('products.get');
Route::post('/products', [\App\Http\Controllers\ProductController::class, 'api_post'])->name('products.post');
Route::put('/products/{id}', [\App\Http\Controllers\ProductController::class, 'api_put'])->name('products.put');
Route::delete('/products/{id}', [\App\Http\Controllers\ProductController::class, 'api_delete'])->name('products.delete');

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
