<?php

if (!function_exists('phone_format')) {
    function phone_format($phone) {
        return str_replace(['(', ')', '-', ' '], '', $phone);
    }
}
