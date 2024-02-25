<?php

use App\Http\Controllers\ProfileController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function() {
    return 1;
});

Route::post('login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store'])->name('login');
Route::get('logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::post('register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store'])->name('register');


Route::view('/{any?}', 'any')
    ->name('any')
    ->where('any', '.*');

