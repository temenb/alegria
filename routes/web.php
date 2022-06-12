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

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::name('businesses.')->prefix('businesses')->group(function() {
    Route::get('/', [\App\Http\Controllers\Business\IndexController::class, 'index'])
        ->name('index');
    Route::get('/{business}', [\App\Http\Controllers\Business\IndexController::class, 'show'])
        ->name('show');
});

require __DIR__.'/auth.php';
