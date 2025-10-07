<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AdminController;

// Game Routes
Route::get('/', [GameController::class, 'index'])->name('game.index');
Route::get('/api/truth', [GameController::class, 'getRandomTruth'])->name('game.truth');
Route::get('/api/dare', [GameController::class, 'getRandomDare'])->name('game.dare');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('index');
    
    // Truths Management
    Route::prefix('truths')->name('truths.')->group(function () {
        Route::get('/', [AdminController::class, 'truthsIndex'])->name('index');
        Route::get('/create', [AdminController::class, 'truthsCreate'])->name('create');
        Route::post('/', [AdminController::class, 'truthsStore'])->name('store');
        Route::get('/{truth}/edit', [AdminController::class, 'truthsEdit'])->name('edit');
        Route::put('/{truth}', [AdminController::class, 'truthsUpdate'])->name('update');
        Route::delete('/{truth}', [AdminController::class, 'truthsDestroy'])->name('destroy');
    });
    
    // Dares Management
    Route::prefix('dares')->name('dares.')->group(function () {
        Route::get('/', [AdminController::class, 'daresIndex'])->name('index');
        Route::get('/create', [AdminController::class, 'daresCreate'])->name('create');
        Route::post('/', [AdminController::class, 'daresStore'])->name('store');
        Route::get('/{dare}/edit', [AdminController::class, 'daresEdit'])->name('edit');
        Route::put('/{dare}', [AdminController::class, 'daresUpdate'])->name('update');
        Route::delete('/{dare}', [AdminController::class, 'daresDestroy'])->name('destroy');
    });
});
