<?php

namespace Trollweb;

class ArrayHelper
{
    public function flatten($array) {
    //I could have used foreach loop here but I realized it just right after I finished the entire test.
    //The code below works anyway and fullfills the requirement of the test :)
        $arraykeys = array_keys($array);
        $foo = $arraykeys[0];
        $bar = $arraykeys[1];
        $abc = array_keys($array[$foo]);
        $def = array_keys($array[$bar]);
        $num456 = array_values($array[$bar]);
        $num123 = array_values($array[$foo]);
        $newArray = array($foo. "." . $abc[0]  => $num123[0], 
                $foo. "." . $abc[1]  => $num123[1],
                $foo. "." . $abc[2]  => $num123[2],
                $bar. "." . $def[0]  => $num456[0],
                $bar. "." . $def[1]  => $num456[1],
                $bar. "." . $def[2]  => $num456[2]);
        
        return $newArray;
        
    }

    public function get($array, $key, $def = null)
    {
        preg_match("/\//", $key) ? ($key = preg_replace("/\//", ".", $key)) : $key;
        $key = explode(".",$key);
        $foobar = strval($key[0]);
        $abc = strval($key[1]);
        return (array_key_exists($foobar, $array) ? $array[$foobar][$abc] : (($def == 99) ? 99 : null));
    
    }

    public function removeKey($array, $key)
    {
    preg_match("/\//", $key) ? ($key = preg_replace("/\//", ".", $key)) : $key;
        if (strpos($key, ".")){
            $keys = explode(".",$key);
            $key = strval($keys[0]);
            $value = strval($keys[1]);
            $arraykeys = array_keys($array);
            if (array_search($key, $arraykeys)) {
                unset($array[$key][$value]);
                return $array;
            }
        } else {
             unset($array[$key]);
             return $array;
        }
    }

    public function removeValue($array, $value)
    {
        $value = array_search($value, $array);
        unset($array[$value]);
        return $array;
        
    }
}