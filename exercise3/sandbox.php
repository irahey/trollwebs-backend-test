<?php
    //$handlemain = fopen ("php://stdin","r");
    //$input = fgets($handlemain);
    $input = "foo bar";
    $input0 = "foo.bar";
    $input1 = "FooBar";
    $input2 = "FOO BAR"; 
    $input4 = "foo bar baz";
    $input5 = "foo_bar";
    $input6 = "føø bær";
to_url_slug($input);
to_url_slug($input0);
to_url_slug($input1);
to_url_slug($input2);
to_url_slug($input4);
to_url_slug($input5);
to_url_slug($input6);


function to_url_slug($str) 
    {
         $pattern = '/[\ \_\.\\\]/';

         if (preg_match($pattern, $str)){
             $str = strtolower($str);
             $patt = array(" ",  ".");
             $oe = '/ø/';
             $ae = '/a/';
             $out = strtolower(str_replace($patt, '-', $str));
             if (preg_match($oe, $out)){
                 $out1 = str_replace('ø', 'o', $out);
                 $out2 = str_replace('æ', 'a', $out1);
                 echo  $out2 . "\n";
             } else {
                echo  $out. "\n";
             }    

         } else {
             $str = strtolower($str);
             echo $str . "\n";
         }
    }

?>