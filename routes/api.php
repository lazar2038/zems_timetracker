<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('projects', \App\Http\Controllers\Api\ProjectController::class);
Route::get('tasks/without_project', [\App\Http\Controllers\Api\TaskController::class, 'indexWithoutProject']);
Route::apiResource('tasks', \App\Http\Controllers\Api\TaskController::class);

Route::apiResource('timelines', \App\Http\Controllers\Api\TimelineController::class);

