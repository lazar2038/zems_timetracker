<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TimelineResource;
use App\Models\Task;
use App\Models\Timeline;
use App\Services\TimelineService;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index()
    {
        $timelines = auth()->user()->timelines()->with(['user', 'task', 'project'])->orderBy('timestamp_start', 'desc')->paginate(10);

        //$timelines = Timeline::with('user', 'task', 'project')->orderBy('timestamp_start', 'desc')->paginate(10);
        return TimelineResource::collection($timelines);
    }


    public function store(Request $request, Task $task)
    {
        $timeline = TimelineService::trigger($task);
        return new TimelineResource($timeline);
    }

}
