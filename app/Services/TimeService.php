<?php

namespace App\Services;

use Carbon\CarbonInterval;

/**
 * Class TimeService.
 */
class TimeService
{
    public static function getDurationString($seconds)
    {
        return CarbonInterval::seconds($seconds)->cascade()->forHumans();
    }
}
