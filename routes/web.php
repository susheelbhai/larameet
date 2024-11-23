<?php

use Illuminate\Support\Facades\Route;
use Susheelbhai\Larameet\Http\Controllers\LarameetController;

Route::middleware('web')->group(function() {
        

    Route::middleware(['auth'])->group(function() {
        Route::get('/meet', [LarameetController::class, 'home'])->name('meet');
        Route::get('/getUser', [LarameetController::class, 'getUser'])->name('getUser');
        Route::get('/chat/{id}', [LarameetController::class, 'chat'])->name('chat'); 
        Route::get('/search', [LarameetController::class, 'search'])->name('search'); 
    });
    
});
