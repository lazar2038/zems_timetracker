<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;
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

}
