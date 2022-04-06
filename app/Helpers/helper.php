<?php

if (!function_exists('numberFormat')) {
    function numberFormat($value)
    {
        if (!is_numeric($value)) {
            return $value;
        }
        return 'Rp. '. number_format($value, 0, '.', '.');
    }
}

if (!function_exists('resetFormat')) {
    function resetFormat($value)
    {
        if (!is_string($value) || !\Illuminate\Support\Str::of($value)->contains('Rp')) return $value;
        $explode = Str::of($value)->explode('.');
        $concat = '';
        for ($i=1; $i < count($explode); $i++) {
            $concat .= $explode[$i];
        }
        return (int) $concat;
    }
}
