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
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $guarded = [];

    public function timelines()
    {
        return $this->hasMany(Timeline::class)->orderBy('timestamp_start', 'desc');
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

    public function getActiveAttribute()
    {
        $timelines = $this->timelines;
        // Проверить каждый timeline на наличие timestamp_end равного null
        foreach ($timelines as $timeline) {
            if ($timeline->timestamp_end === null) {
                return TRUE; // Если найден хотя бы один активный timeline, вернуть true
            }
        }

        return FALSE; // Если не найдено активных timelines, вернуть false
    }

}
