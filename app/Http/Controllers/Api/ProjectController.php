<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('tasks', 'user', 'timelines')->orderBy('id', 'desc')->paginate(10);
        return ProjectResource::collection($projects);
    }

    public function show(Project $project)
    {
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
}
