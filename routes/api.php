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



Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::apiResource('projects', \App\Http\Controllers\Api\ProjectController::class);
    Route::get('tasks/without_project', [\App\Http\Controllers\Api\TaskController::class, 'indexWithoutProject']);
    Route::get('tasks/{id}/trigger', [\App\Http\Controllers\Api\TaskController::class, 'trigger']);
    Route::get('tasks/{id}/timelines', [\App\Http\Controllers\Api\TaskController::class, 'timelines']);
    Route::apiResource('tasks', \App\Http\Controllers\Api\TaskController::class);
    Route::apiResource('timelines', \App\Http\Controllers\Api\TimelineController::class);

});




