<?php

namespace App\Models;

use App\Services\ProjectService;
use App\Services\TimeService;
use App\Traits\HasDurationString;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    use HasFactory;
    use HasDurationString;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class)->orderBy('id', 'desc');
    }


    public function timelines()
    {
        return $this->hasManyThrough(Timeline::class, Task::class)->orderBy('timestamp_start', 'desc');
    }

    public function getDurationInSecondsAttribute()
    {
        return ProjectService::getDurationInSeconds($this);
    }








}
