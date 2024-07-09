<?php

namespace App\Service;

class UtilArr
{
    /**
     * Arr::assoc_to_keyval
     * 
     * $assocArray = [
     *  ['key' => 'name', 'value' => 'John'],
     *  ['key' => 'age', 'value' => 25],
     *  ['key' => 'email', 'value' => 'john@example.com']
     * ];
     * 
     * return Array(
     * [name] => John
     * [age] => 25
     * [email] => john@example.com
     * )
     *
     * @param $array
     * @param $key
     * @param $value
     * @return array
     */
    public static function assocToKeyval($array, $key, $value)
    {
        logger()->error(json_encode($array));
        logger()->error(json_encode($key));
        logger()->error(json_encode($value));
        return array_reduce($array, function($carry, $item) use($key, $value) {
            $carry[$item[$key]] = $item[$value];
            return $carry;
        }, []);
    }
}
