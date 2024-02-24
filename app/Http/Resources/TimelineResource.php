<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TimelineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'task' => $this->whenLoaded('task'),
            'project' => new ProjectResource($this->whenLoaded('project')),
            'timestamp_start' => $this->timestamp_start,
            'timestamp_end' => $this->timestamp_end,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
            'active' => $this->active

        ];
    }
}
