<?php
if (!function_exists('get_search_array_by_word')) {
    function get_search_array_by_word($word)
    {
        return preg_split("/[\s]+/", str_replace("　", " ", $word));
    }
}
