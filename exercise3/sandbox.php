<?php
    //$handlemain = fopen ("php://stdin","r");
    //$input = fgets($handlemain);
    $input = "abc";
    $input0 = "ab cd";
    $input1 = 3;
    $input2 = 3.1; 
    $input3 = 123;
    $input4 = "ab";
    $input5 = 2;
    
    $input6 = "6";
    $input7 = "abc";
    $input8 = 5;
    $input9 = 5.1;
    $input10 = "123456";
    
    $input11 = "6";
    $input12 = "foo";
    $input13 = 1.1;
    $input14 = null;
    $input15 = true;
    
    $input16 = 66;
    $input17 = 0;
    $input18 = 1.1;
    $input19 = null;
    $input20 = true;
    
    $input21 = true;
    $input22 = false;
    $input23 = null;
    $input24 = 0;
    $input25 = 1;
    $input26 = "true";
    
    $input27 = ["foo"];
    $input28 = [];
    $input29 = null;
    $input30 = "foo";
    $input31 = 1;

    $input32 = new \DateTime;
    $input33 = null;
    $input34 = "Datetime";
    $input35 = 1;
    
    $input36 = "foo";
    $input37 = 12;
    $input38 = 99.99;
    
    $input39 = "bar";
    $input40 = "foobar";
    $input41 = "foobarbaz";
    $input42 = "foo bar baz";
    $input43 = "foobaz";
    $input44 = true;
    
    $input45 = "foobar";
    $input46 = "bar12";
    $input47 = "bar";
    $input48 = "foobarbaz";
    $input49 = "foobaz";
    


    
echo "\n"."min3"."\n";
$rules = ["min" => 3];
ip_addresses($input, $rules1);
echo "true."."\n";
ip_addresses($input0, $rules1);
echo "true."."\n";
ip_addresses($input1, $rules1);
echo "true."."\n";
ip_addresses($input2, $rules1);
echo "true."."\n";
ip_addresses($input3, $rules1);
echo "true."."\n";
ip_addresses($input4, $rules1);
echo "false."."\n";
ip_addresses($input5, $rules1);
echo "false."."\n";


echo "\n"."max5"."\n";
$rules = ["max" => 5];
ip_addresses($input6, $rules2);
echo "true."."\n";
ip_addresses($input7, $rules2);
echo "true."."\n";
ip_addresses($input8, $rules2);
echo "true."."\n";
ip_addresses($input9, $rules2);
echo "false."."\n";
ip_addresses($input10, $rules2);
echo "false."."\n";

echo "\n"."string"."\n";
$rules = ["type" => "string"];
ip_addresses($input11, $rules3);
echo "true."."\n";
ip_addresses($input12, $rules3);
echo "true."."\n";
ip_addresses($input13, $rules3);
echo "false."."\n";
ip_addresses($input14, $rules3);
echo "false."."\n";
ip_addresses($input15, $rules3);
echo "false."."\n";

echo "\n"."integer"."\n";
$rules = ["type" => "integer"];
ip_addresses($input16, $rules4);
echo "true."."\n";
ip_addresses($input17, $rules4);
echo "true."."\n";
ip_addresses($input18, $rules4);
echo "false."."\n";
ip_addresses($input19, $rules4);
echo "false."."\n";
ip_addresses($input20, $rules4);
echo "false."."\n";

echo "\n"."bool"."\n";
$rules = ["type" => "bool"];
ip_addresses($input21, $rules5);
echo "true."."\n";
ip_addresses($input22, $rules5);
echo "true."."\n";
ip_addresses($input23, $rules5);
echo "false."."\n";
ip_addresses($input24, $rules5);
echo "false."."\n";
ip_addresses($input25, $rules5);
echo "false."."\n";
ip_addresses($input26, $rules5);
echo "false."."\n";

echo "\n"."array"."\n";
$rules = ["type" => "array"];
ip_addresses($input27, $rules6);
echo "true."."\n";
ip_addresses($input28, $rules6);
echo "true."."\n";
ip_addresses($input29, $rules6);
echo "false."."\n";
ip_addresses($input30, $rules6);
echo "false."."\n";
ip_addresses($input31, $rules6);
echo "false."."\n";

echo "\n"."object"."\n";
$rules = ["type" => "object"];
ip_addresses($input32, $rules7);
echo "true."."\n";
ip_addresses($input33, $rules7);
echo "false."."\n";
ip_addresses($input34, $rules7);
echo "false."."\n";
ip_addresses($input35, $rules7);
echo "false."."\n";

echo "\n"."str int float"."\n";
$rules = ["type" => "string|integer|float"];
ip_addresses($input36, $rules8);
echo "true."."\n";
ip_addresses($input37, $rules8);
echo "true."."\n";
ip_addresses($input38, $rules8);
echo "true."."\n";

echo "\n"."bar"."\n";
$rules = ["contains" => "bar"];
ip_addresses($input39, $rules9);
echo "true."."\n";
ip_addresses($input40, $rules9);
echo "true."."\n";
ip_addresses($input41, $rules9);
echo "true."."\n";
ip_addresses($input42, $rules9);
echo "true."."\n";
ip_addresses($input43, $rules9);
echo "false."."\n";
ip_addresses($input44, $rules9);
echo "false."."\n";


echo "\n"."min4 max7 bar"."\n";
$rules = ["min" => 4, "max" => 7, "contains" => "bar"];
ip_addresses($input45, $rules10);
echo "true."."\n";
ip_addresses($input46, $rules10);
echo "true."."\n";
ip_addresses($input47, $rules10);
echo "false."."\n";
ip_addresses($input48, $rules10);
echo "false."."\n";
ip_addresses($input49, $rules10);
echo "false."."\n";

function ip_addresses($content, $rules) {
    if (in_array("min", $rules, true)){
            $rules = array_values($rules);
            $length = intval(strlen($content));
            $min =intval($rules[0]);
            $max = intval($rules[1]);
            $bar = $rules[2];
            $bool = strpos($content, $bar);
         if ($length >=$min && $length <= $max){
            if($bool !== false){
                
               echo "true"."\n";
            }else {
                echo "false1"."\n";
            }
        }else {
            echo "false2"."\n";
        }
    } elseif (in_array("min", $rules, true)){   
        $rulesmin = array_values($rules);
        if (strlen($content) < intval($rulesmin[0])){
            echo "false"."\n";
        }else {
            echo "true"."\n";
        }
    } elseif (in_array("max", $rules)){   
        $rulesmax = array_values($rules);
        if (strlen($content) > $rulesmax[0]){
            echo "false"."\n";
        }else {
            echo "true"."\n";
        }
    } elseif (in_array("type", $rules)){   
        $rules = array_values($rules);
        if (rules[0] == "string" ){
            if (is_string($content)){
              echo "true"."\n";  
            }else{
            echo "false"."\n";
            }
        }elseif (rules[0] == "integer" ){
            if (is_integer($content)){
              echo "true"."\n";  
            }else{
            echo "false"."\n";
            }
        }elseif (rules[0] == "bool" ){
            if (is_bool($content)){
              echo "true"."\n";  
            }else{
            echo "false"."\n";
            }
        }elseif (rules[0] == "array" ){
            if (is_array($content)){
              echo "true"."\n";  
            }else{
            echo "false"."\n";
            }
        } elseif (rules[0] == "object" ){
            if (is_object($content)){
              echo "true"."\n";  
            }else{
            echo "false"."\n";
            }
        } elseif (rules[0] == "string|integer|float" ){
            if (is_float($content) && is_string($content) && is_integer($content)){
                echo "true"."\n";
            }else {
                echo "false"."\n";
            }
        }
    } elseif (in_array("contains", $rules)){   
        $rules = array_values($rules);
        if (rules[0] !== "bar" ){
            echo "false"."\n";
        }else {
            echo "true"."\n";
        }
    } else {
    
            echo "hello"."\n";
    
    }
}

?>