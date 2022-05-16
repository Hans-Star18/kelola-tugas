<?php
namespace App\Helpers;

use Illuminate\Support\Carbon;

class StrToDate
{
    public static function strtodate($string)
    {
        return new Carbon($string);
    }
}