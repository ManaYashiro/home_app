<?php

namespace App\Helpers;

class CustomHelper
{
    public static function trimFilename($fileName, $keyword)
    {
        return \Illuminate\Support\Str::replaceFirst(
            $keyword . '/',
            '',
            $fileName,
        );
    }
}
