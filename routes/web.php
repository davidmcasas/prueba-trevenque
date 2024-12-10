<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\ProductController::class, 'index'])->name('index');

Route::get('/new', [\App\Http\Controllers\ProductController::class, 'new'])->name('new');
Route::post('/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('create');
Route::post('/ajax_active', [\App\Http\Controllers\ProductController::class, 'ajax_active'])->name('ajax_active');


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

//require __DIR__.'/auth.php';
