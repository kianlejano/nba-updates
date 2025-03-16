<?php

namespace App\Services;

class UnitFormatter
{
    public static function footToMeter($footInches)
    {
        if (!$footInches || !preg_match('/^(\d+)-(\d+)$/', $footInches, $matches)) {
            return null;
        }

        [$fullMatch, $feet, $inches] = $matches;

        $meter = ($feet * 0.3048) + ($inches * 0.0254);
        return round($meter, 2);
    }

    //0.453592

    public static function poundToKg($lbs)
    {
        if (!$lbs) {
            return null;
        }
        
        return round(($lbs * 0.453592), 2);
    }
}