<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\File\IndexController;

Route::middleware('auth')->group(function() {
    Route::name('files.')->group(function() {
        Route::post('/businesses/{business}/uploadFile', [IndexController::class, 'business'])
            ->name('uploadFile');
        Route::post('/user/{user}/avatar', [IndexController::class, 'userAvatar'])
            ->name('avatar');
    });
});
