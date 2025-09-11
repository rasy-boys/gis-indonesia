<?php

use Illuminate\Support\Facades\Request;

if (!function_exists('isActive')) {
    function isActive($patterns, $output = "active") {
        foreach ((array)$patterns as $pattern) {
            if (Request::is($pattern)) {
                return $output;
            }
        }
        return '';
    }
}
