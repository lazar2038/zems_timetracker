<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\DB;

/**
 * Class TaskService.
 */
class TaskService
{

    public static function getDurationInSeconds(Task $task)
    {
        $timelines = $task
            ->timelines()
            ->select(DB::raw('timestamp_end - timestamp_start as seconds'))
            ->get()
            ->sum(function ($row) {
                return $row->seconds;
            });

        if(isset($timelines) && $timelines > 0) {
            $output = $timelines;
        }

        else {
            $output = 0;
        }

        return $output;
    }


}
