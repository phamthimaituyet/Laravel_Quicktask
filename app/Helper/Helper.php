<?php 

// function format date time
if (!function_exists('formatDate')) {
    function formatDate($date, string $format = 'D/m/Y')
    {
        if ($date instanceof \Carbon\Carbon) {
            return $date->format($format);
        }

        return $date;
    }
}
