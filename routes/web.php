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
    $tasks = Task::with('timelines.user', 'user')->whereDoesntHave('project')->orderBy('id', 'desc')->paginate(10);
    return $tasks;
});

Route::view('/{any?}', 'any')
    ->name('any')
    ->where('any', '.*');
