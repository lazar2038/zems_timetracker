<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TimelineResource;
use App\Models\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index()
    {
        $timelines = Timeline::with('user', 'task', 'project')->orderBy('timestamp_start')->get();
        return TimelineResource::collection($timelines);
    }
}
