<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;




    protected $guarded = [];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function project()
    {
        return $this->belongsToThrough(Project::class, Task::class);
    }

    public function user()
    {
        return $this->belongsToThrough(User::class, Task::class);
    }

    public function getActiveAttribute()
    {

        if ($this->timestamp_end === null) {
            return TRUE; // Если найден хотя бы один активный timeline, вернуть true
        }

        return FALSE; // Если не найдено активных timelines, вернуть false
    }

}
