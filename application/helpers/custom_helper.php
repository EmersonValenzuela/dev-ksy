<?php

if (!function_exists('arrayToCommaString')) {
    function arrayToCommaString($data)
    {

        $dataArray = json_decode($data, true);
        $valuesArray = array_map(function ($item) {
            return $item['value'];
        }, $dataArray);

        $resultString = implode(',', $valuesArray);

        echo $resultString;
    }
}
