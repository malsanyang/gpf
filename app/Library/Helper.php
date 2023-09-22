<?php

namespace App\Library;

use Carbon\Carbon;

class Helper
{
    /**
     * @return string
     */
    public static function generateRefNumber(): string
    {
        $timestamp = Carbon::now()->timestamp;
        $year = date('Y');
        return "$year-$timestamp";
    }

}
