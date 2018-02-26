<?php

namespace Trollweb;

class ValidationHelper
{
    public function url($url)
    {
        $url = strpos($url, 'http') !== 0 ? "http://$url" : $url;
        if (filter_var($url, FILTER_VALIDATE_URL) && strpos($url, '.')){
            return true;
        } elseif (strpos($url, 'æ') !== false || strpos($url, 'ø') !== false) {
             $out1 = str_replace('ø', 'o', $url);
             $out2 = str_replace('æ', 'a', $out1);
             if (filter_var($out2, FILTER_VALIDATE_URL)){
                 return true;
             }
        } else {
            return false;
        
        }
    }

    public function email($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function ip($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            return true;
        } else {
            return false;
        }
    }

    public function validate($content, $rules){
    $key = key($rules);
    $value = current($rules);
    
    if ($key == "min") {
        $rulesval = array_values($rules);
        is_string($content) ? $length = intval(strlen($content)) : $length = floatval($content);
        if (empty($rulesval[1]) == false && empty($rulesval[2]) == false) {
            $bool = strpos($content, $rulesval[2]);
            if ($length > $rulesval[0] && $length < $rulesval[1] && $bool !== false) {
                return true;
            }else {
                return false;
            }
        }elseif ($length < $rulesval[0]) {
            return false;
        } else   {
            return true;
        }    
    } elseif ($key == "max") {
        $rulesval = array_values($rules);
        is_string($content) ? $length = intval(strlen($content)) : $length = floatval($content);
        return ($length <= $rulesval[0] ? true : false);
        
    } elseif ($key == "type") {
        if ($value == "integer") {
            return (is_integer($content) ? true : false);
        }elseif ($value == "bool") {
            return (is_bool($content) ? true : false);
        } elseif ($value == "string") {
            return (is_string($content) ? true : false);
        } elseif ($value == "array") {
            return (is_array($content) ? true : false);
        } elseif ($value== "object") {
            return (is_object($content) ? true : false);
        } elseif ($value == "string|integer|float") {
            return (is_float($content) || is_string($content) || is_integer($content) ? true : false);
        } else {
            return false;
        }
    
    } elseif ($key == "contains") {
        $rulesval = array_values($rules);
        $bool = strpos($content, $rulesval[0]);
        return ($bool !== false ? true : false);
    } else {
        return false;
    }
}   

    }

