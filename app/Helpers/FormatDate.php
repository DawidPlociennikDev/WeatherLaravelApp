<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class FormatDate
{
    public static function hour(int $time) : string
    {
        return Str::replace('00', '', $time) . ':00';
    }

}