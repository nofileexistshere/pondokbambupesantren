<?php

if (!function_exists('format_number_short')) {
    /**
     * Format number with abbreviation (K, M, B)
     */
    function format_number_short($number)
    {
        if ($number >= 1000000000) {
            return number_format($number / 1000000000, 1, ',', '.') . 'B';
        } elseif ($number >= 1000000) {
            return number_format($number / 1000000, 0, ',', '.') . 'M';
        } elseif ($number >= 1000) {
            return number_format($number / 1000, 0, ',', '.') . 'K';
        }
        return number_format($number, 0, ',', '.');
    }
}
