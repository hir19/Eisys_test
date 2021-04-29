<?php

if (!function_exists('get_per_page')) {

    function get_per_page()
    {
        return request('per_page') ? : 25;
    }

}