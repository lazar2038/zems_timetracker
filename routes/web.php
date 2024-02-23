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

    $task = Task::with('timelines')->find(15);


    $timeline = $task->timelines()->latest()->first();


    $datetime_end = \Carbon\Carbon::now();//начало таймлайна ещё от 0 до 8 часов от окончания
    $time_end = $datetime_end->toTimeString();
    $date_end = $datetime_end->toDateString();
    $timestamp_end = $datetime_end->timestamp;

    $datetime_start = \Carbon\Carbon::now();//начало таймлайна ещё от 0 до 8 часов от окончания
    $time_start = $datetime_start->toTimeString();
    $date_start = $datetime_start->toDateString();
    $timestamp_start = $datetime_start->timestamp;


    if (isset($timeline) && ($timeline->timestamp_end === NULL)) {

                  $timeline->update([
                    'task_id' => $task->id,
                    'timestamp_end' => $timestamp_end,
                    'time_end' => $time_end,
                    'date_end' => $date_end,
                ]);

    }

    else {
                $timeline = new \App\Models\Timeline([
                    'task_id' => $task->id,
                    'timestamp_start' => $timestamp_start,
                    'time_start' => $time_start,
                    'date_start' => $date_start
                ]);
                $task->load('timelines');
                \App\Models\Timeline::where('task_id', $task->id)->where('timestamp_end', NULL)->get()->each->update([
                    'timestamp_end' => $timestamp_end,
                    'time_end' => $time_end,
                    'date_end' => $date_end]
                );
                $timeline->save();

        }
    return $timeline;


});

Route::view('/{any?}', 'any')
    ->name('any')
    ->where('any', '.*');
