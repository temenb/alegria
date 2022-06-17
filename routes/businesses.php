<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/businesses');

Route::name('businesses.')->prefix('businesses')->group(function() {
    Route::get('/', [\App\Http\Controllers\Business\IndexController::class, 'index'])
        ->name('index');
});

Route::name('services.')->prefix('services')->group(function() {
    Route::get('/autocompleteSearch', [\App\Http\Controllers\Services\IndexController::class, 'autocompleteSearch'])
        ->name('autocompleteSearch');
});

Route::middleware('auth')->group(function() {
    Route::name('businesses.')->prefix('businesses')->group(function() {
        Route::get('/create', [\App\Http\Controllers\Business\IndexController::class, 'create'])
            ->name('create');
        Route::post('/create', [\App\Http\Controllers\Business\IndexController::class, 'store'])
            ->name('store');
    });
});
