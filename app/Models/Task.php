<?php

namespace App\Models;

use App\Services\TaskService;
use App\Services\TimeService;
use App\Traits\HasDurationString;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;
    use HasDurationString;

    protected $guarded = [];

    public function timelines()
    {
        return $this->hasMany(Timeline::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function getDurationInSecondsAttribute()
    {
        return TaskService::getDurationInSeconds($this);
    }

}
