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

Route::redirect('/', '/customers');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::name('customers.')->prefix('customers')->group(function() {
    Route::get('/', [\App\Http\Controllers\Customer\IndexController::class, 'index'])
        ->name('index');
    Route::get('/{customer}', [\App\Http\Controllers\Customer\IndexController::class, 'show'])
        ->name('show');
});

require __DIR__.'/auth.php';
