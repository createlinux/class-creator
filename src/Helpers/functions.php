<?php

require_once __DIR__."/class_builder.php";

use Illuminate\Support\Str;

if (!function_exists('to_singular_name')) {
    /**
     *
     * 把单词转换为单数，例如DoctorsUsers会转为DoctorUser
     * @param string $name
     * @return string
     */
    function to_singular_name(string $name): string
    {
        $name = Str::snake($name);
        $splitName = explode("_", $name);
        foreach ($splitName as &$word) {
            $word = Str::singular($word);
        }

        $name = implode("_", $splitName);
        return $name;
    }
}
