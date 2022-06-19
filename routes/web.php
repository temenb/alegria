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

require __DIR__.'/auth.php';
require __DIR__.'/businesses.php';
require __DIR__.'/files.php';

Route::redirect('/', '/businesses');

Route::get('/{business}', [\App\Http\Controllers\Business\IndexController::class, 'show'])
    ->name('businesses.show');
