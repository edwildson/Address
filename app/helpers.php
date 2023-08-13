<?php

if (!function_exists('formatStreetName')) {
    function formatStreetName($street) {
        $formattedStreet = str_replace(' ', '-', $street);
        $formattedStreet = strtolower($formattedStreet);

        return $formattedStreet;
    }
}

if (!function_exists('removeAccents')) {
    function removeAccents($string) {
        return iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);
    }
}