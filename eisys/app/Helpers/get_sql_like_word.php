<?php

if (!function_exists('get_sql_like_word')) {

    function get_sql_like_word($value)
    {
        return '%' . addcslashes($value, '\_%') . '%';
    }

}