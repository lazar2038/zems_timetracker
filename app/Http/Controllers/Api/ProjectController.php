<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects()->with(['tasks'])->orderBy('id', 'desc')->paginate(10);
        return ProjectResource::collection($projects);
    }

    public function show(Project $project)
    {
        $this->authorize('view', $project);

        if(!$project) {
            return response()->json(['error' => 'Такой страницы не существует'], 404);
        }

        $project->load('tasks');
        return new ProjectResource($project);
    }

    public function store(StoreProjectRequest $request)
    {

        $project = new Project($request->validated());
        $project->user_id = Auth::id();
        $project->save();

        return new ProjectResource($project);
    }

    public function update(Project $project, StoreProjectRequest  $request)
    {
        $this->authorize('update', $project);

        if(!$project) {
            return response()->json(['error' => 'Такой страницы не существует'], 404);
        }

        $project->update($request->validated());
        return new ProjectResource($project);
    }

    public function destroy(Request $request, Project $project)
    {
        $this->authorize('delete', $project);

        if ($request->input('confirmation') == 'DELETE') {
            $project->tasks()->each(function ($task) {
                $task->timelines()->delete();
                $task->delete();
            });
            $project->delete();
            return response()->noContent();
        }
        else {
            return response()->json(['error' => 'Неверное подтверждение для удаления задачи'], 400);
        }
    }

}
