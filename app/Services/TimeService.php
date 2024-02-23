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

        if(!$seconds) {
            $output = '0 секунд';
        }
        else {
            $output = CarbonInterval::seconds($seconds)->cascade()->forHumans();
        }
        return $output;
    }

}
