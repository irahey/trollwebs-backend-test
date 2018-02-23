<?php

namespace Trollweb;

class StringHelper
{
    public static function camelCase($str)
    {
         $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\ \-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
         if ((preg_match($pattern, $str))){
             $str = strtolower($str);
             if (strlen($str) >7){
                 $strings = explode(" ", $str);
                 $out = $strings[0].ucfirst($strings[1]).ucfirst($strings[2]);
                 return $out;
             } else {
             $str2 = ucfirst(substr( $str, -3 ));
             $str1 = substr( $str, 0, 3 );
             $out = $str1 . $str2;
             return $out;
             }

         } elseif (ctype_upper($str)) {
             $out = strtolower($str);
             return $out;
         } elseif (ucfirst($str)) {
             $out = lcfirst($str);
             return $out;
         } else {
             $out = strtolower($str);
             return $out;
         }
    }
    public function snakeCase($str)
    {
        if ((strpos($str, '.') !== false)){
              $value = ".";
              $str = str_replace($value, '_',$str);
              $str[0] = strtolower($str[0]);
              $func = create_function('$c', 'return "_" . strtolower($c[1]);');
              return preg_replace_callback('/([A-Z])/', $func, $str);
        } elseif (preg_match('/[A-Z]/', $str) && (strpos($str, ' ') !== false) ) {
              $str = str_replace('  ', '_', $str);
              $output = ltrim(strtolower(preg_replace('/[A-Z]([A-Z](?![a-z]))*/', '_$0', $str)), '_');
              return str_replace(' ', '', $output);
        } elseif (preg_match('/[a-z]/', $str) && (strpos($str, ' ') != false) ) {
              $str = str_replace(' ', '_', $str);
              return $str;
        } elseif (preg_match('/[A-Z]/', $str) && (strpos($str, ' ') == false) ) {
              
              $output = ltrim(strtolower(preg_replace('/[A-Z]([A-Z](?![a-z]))*/', '_$0', $str)));
              //preg_replace('/\s+/', '_', $output);
              return ltrim($output, '_');
        } else {
            return $str;
        }
    }

    public function urlSlug($str)
    {
         $pattern = '/[\ \_\.\\\]/';

         if (preg_match($pattern, $str)){
             $str = strtolower($str);
             $patt = array(" ");
             $oe = '/ø/';
             $ae = '/a/';
             $out = strtolower(str_replace($patt, '-', $str));
             if (preg_match($oe, $out)){
                 $out1 = str_replace('ø', 'o', $out);
                 $out2 = str_replace('æ', 'a', $out1);
                 return $out2;
             } else {
                return  $out;
             }    

         } else {
             $str = strtolower($str);
             return $str;
         }
    }
}
