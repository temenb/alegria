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

Route::redirect('/', '/entrepreneurs');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::name('entrepreneurs.')->prefix('entrepreneurs')->group(function() {
    Route::get('/', [\App\Http\Controllers\EntrepreneurController::class, 'index'])
        ->name('index');
    Route::get('/{entrepreneur}', [\App\Http\Controllers\EntrepreneurController::class, 'show'])
        ->name('show');
});

require __DIR__.'/auth.php';
