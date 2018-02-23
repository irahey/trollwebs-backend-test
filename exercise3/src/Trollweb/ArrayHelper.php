<?php

namespace Trollweb;

class ArrayHelper
{
    //https://gist.github.com/SeanCannon/6585889
    //https://stackoverflow.com/questions/526556/how-to-flatten-a-multi-dimensional-array-to-simple-one-in-php
    //https://stackoverflow.com/questions/7941212/getting-data-from-multi-level-array
    public function flatten($array) {
    if (!is_array($array)) {
        // nothing to do if it's not an array
        return array($array);
    }

    $result = array();
    foreach ($array as $key => $value) {
        // explode the sub-array, and add the parts
        $result = array_merge($result, array($key => $value));
    }

    return $result;

        
    }

    public function get($array, $key)
    {
    }

    public function removeKey($array, $key)
    {
    }

    public function removeValue($array, $value)
    {
    }
}
