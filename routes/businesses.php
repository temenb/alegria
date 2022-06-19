<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Business\IndexController;

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
    Route::get('/', [IndexController::class, 'index'])
        ->name('index');
    Route::get('/search', [IndexController::class, 'search'])
        ->name('search');
});

Route::name('services.')->prefix('services')->group(function() {
    Route::get('/autocompleteSearch', [\App\Http\Controllers\Services\IndexController::class, 'autocompleteSearch'])
        ->name('autocompleteSearch');
});

Route::middleware('auth')->group(function() {
    Route::name('businesses.')->prefix('businesses')->group(function() {
        Route::get('/create', [IndexController::class, 'create'])
            ->name('create');
        Route::post('/create', [IndexController::class, 'store'])
            ->name('store');
    });
});
