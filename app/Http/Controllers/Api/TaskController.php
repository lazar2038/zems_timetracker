<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
use App\Http\Resources\TimelineResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('project', 'timelines.user', 'user')->whereHas('project')->orderBy('id', 'desc')->paginate(10);
        return TaskResource::collection($tasks);
    }

    public function indexWithoutProject()
    {
        $tasks = Task::with('timelines.user', 'user')->whereDoesntHave('project')->orderBy('id', 'desc')->paginate(10);
        return TaskResource::collection($tasks);
    }

    public function show(Task $task)
    {

        if(!$task) {
            return response()->json(['error' => 'Такой страницы не существует'], 404);
        }

        $task->load('project', 'timelines');
        return new TaskResource($task);
    }




    public function store(StoreTaskRequest $request)
    {
        $task = new Task($request->validated());
        $task->save();
        return new TaskResource($task);
    }


    public function update(Task $task, StoreTaskRequest  $request)
    {

        if(!$task) {
            return response()->json(['error' => 'Такой страницы не существует'], 404);
        }

        $task->update($request->validated());
        return new TaskResource($task);
    }

    public function destroy(Request $request, Task $task)
    {

        if ($request->input('confirmation') == 'DELETE') {
            $task->timelines()->delete();
            $task->delete();
            return response()->noContent();
        }
        else {
            return response()->json(['error' => 'Неверное подтверждение для удаления задачи'], 400);
        }
    }

    public function trigger($task_id)
    {
        $task = Task::find($task_id);
        $task->load('timelines');

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
            return response()->json(['OK' => 'Триггер сработал'], 202);

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
                    'date_end' => $date_end
                ]
            );
            $timeline->save();
            return response()->json(['OK' => 'Триггер сработал'], 202);

        }

    }

    public function timelines($task_id)
    {
        $task = Task::find($task_id);
        $task->load('timelines');
        $timelines = $task->timelines;
        return TimelineResource::collection($timelines);

    }

}
