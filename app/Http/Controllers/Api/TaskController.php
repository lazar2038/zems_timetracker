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
        $tasks = Task::with('project', 'timelines.user', 'user')->get();
        return TaskResource::collection($tasks);
    }

    public function show(Task $task)
    {
        $task->load('tasks');
        return new TaskResource($task);
    }

    public function store(StoreTaskRequest  $request)
    {
        $task = new Task($request->validated());
        $task->save();
        return new TaskResource($task);
    }
}
