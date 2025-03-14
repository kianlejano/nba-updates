<?php

namespace App\Services;

use Carbon\Carbon;

class DateFormatter
{
    public static function weekdayMonthDay($date)
    {
        return Carbon::parse($date)->format('l, F j');
    }

    public static function formatTimePH($datetime)
    {
        return Carbon::parse($datetime)->setTimezone('Asia/Manila')->format('h:i A');
    }

    public static function checkTodayOrTomorrow($date)
    {
        $carbonDate = Carbon::parse($date);
        if ($carbonDate->isToday()) {
            return 'Today';
        } elseif ($carbonDate->isTomorrow()) {
            return 'Tomorrow';
        } elseif ($carbonDate->isYesterday()) {
            return 'Yesterday';
        } else {
            return '';
        }
    }
}