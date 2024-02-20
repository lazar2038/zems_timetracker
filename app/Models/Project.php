<?php

namespace App\Models;

use App\Services\ProjectService;
use App\Services\TimeService;
use App\Traits\HasDurationString;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use HasDurationString;

    protected $guarded = [];


    public function tasks()
    {
        return $this->hasMany(Task::class);
    }


    public function getDurationInSecondsAttribute()
    {
        return ProjectService::getDurationInSeconds($this);
    }


}
