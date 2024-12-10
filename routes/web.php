<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('index');
Route::get('/new', [\App\Http\Controllers\ProductController::class, 'new'])->name('new');
Route::post('/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('create');
Route::post('/ajax_active', [\App\Http\Controllers\ProductController::class, 'ajax_active'])->name('ajax_active');



