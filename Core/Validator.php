<?php

namespace Core;

class Validator
{
    public static function string($value, $max = INF, $min = 1)
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }
}
