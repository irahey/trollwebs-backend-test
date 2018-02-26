<?php
$rules = array("min" => 3);
$input = "abc";
$input0 = "ab cd";
$input1 = 3;
$input2 = 3.1; 
$input3 = 123;
$input4 = "ab";
$input5 = 2;
ip_addresses($input, $rules);
ip_addresses($input0, $rules);
ip_addresses($input1, $rules);
ip_addresses($input2, $rules);
ip_addresses($input3, $rules);
ip_addresses($input4, $rules);
ip_addresses($input5, $rules); 

$rules = array("max" => 5);
$input6 = "6";
$input7 = "abc";
$input8 = 5;
$input9 = 5.1;
$input10 = "123456";
ip_addresses($input6, $rules);
ip_addresses($input7, $rules);
ip_addresses($input8, $rules);
ip_addresses($input9, $rules);
ip_addresses($input10, $rules);

$rules = array("type" => "string");
$input11 = "6";
$input12 = "foo";
$input13 = 1.1;
$input14 = null;
$input15 = true;
ip_addresses($input11, $rules);
ip_addresses($input12, $rules);
ip_addresses($input13, $rules);
ip_addresses($input14, $rules);
ip_addresses($input15, $rules);

$rules = ["type" => "integer"];
$input16 = 66;
$input17 = 0;
$input18 = 1.1;
$input19 = null;
$input20 = true;
ip_addresses($input16, $rules);
ip_addresses($input17, $rules);
ip_addresses($input18, $rules);
ip_addresses($input19, $rules);
ip_addresses($input20, $rules);

$rules = ["type" => "bool"];
$input21 = true;
$input22 = false;
$input23 = null;
$input24 = 0;
$input25 = 1;
$input26 = "true";
ip_addresses($input21, $rules);
ip_addresses($input22, $rules);
ip_addresses($input23, $rules);
ip_addresses($input24, $rules);
ip_addresses($input25, $rules);
ip_addresses($input26, $rules);

$rules = ["type" => "array"];
$input27 = ["foo"];
$input28 = [];
$input29 = null;
$input30 = "foo";
$input31 = 1;
ip_addresses($input27, $rules);
ip_addresses($input28, $rules);
ip_addresses($input29, $rules);
ip_addresses($input30, $rules);
ip_addresses($input31, $rules);

$rules = ["type" => "object"];
$input32 = new \DateTime;
$input33 = null;
$input34 = "Datetime";
$input35 = 1;
ip_addresses($input32, $rules);
ip_addresses($input33, $rules);
ip_addresses($input34, $rules);
ip_addresses($input35, $rules);

$rules = ["type" => "string|integer|float"];
$input36 = "foo";
$input37 = 12;
$input38 = 99.99;
ip_addresses($input36, $rules);
ip_addresses($input37, $rules);
ip_addresses($input38, $rules);

$rules = ["contains" => "bar"];
$input39 = "bar";
$input40 = "foobar";
$input41 = "foobarbaz";
$input42 = "foo bar baz";
$input43 = "foobaz";
$input44 = true;
ip_addresses($input39, $rules);
ip_addresses($input40, $rules);
ip_addresses($input41, $rules);
ip_addresses($input42, $rules);
ip_addresses($input43, $rules);
ip_addresses($input44, $rules);

$rules = ["min" => 4, "max" => 7, "contains" => "bar"];
$input45 = "foobar";
$input46 = "bar12";
$input47 = "bar";
$input48 = "foobarbaz";
$input49 = "foobaz";
ip_addresses($input45, $rules);
ip_addresses($input46, $rules);
ip_addresses($input47, $rules);
ip_addresses($input48, $rules);
ip_addresses($input49, $rules);

function ip_addresses($content, $rules) {
$key = key($rules);
$value = current($rules);

if ($key == "min") {
    $rulesval = array_values($rules);
    is_string($content) ? $length = intval(strlen($content)) : $length = intval($content);
    if ($rulesval[1] !== null && $rulesval[2] !== null) {
        //$length = intval(strlen($content));
        $bool = strpos($content, $rulesval[2]);
        if ($length > $rulesval[0] && $length < $rulesval[1] && $bool !== false) {
            echo "pass" . $rulesval[0].  $rulesval[1].  $rulesval[2];
        }else {
            echo "fail min max contain ";
        }
    }elseif ($length < $rulesval[0]) {
        echo $length;
    } else   {
        echo "pass";
    }    
} elseif ($key == "max") {
    $rulesval = array_values($rules);
    is_string($content) ? $length = intval(strlen($content)) : $length = intval($content);
    echo ($length <= $rulesval[0] ? "pass" . $key : "fail" . $key);
    
} elseif ($key == "type") {
    if ($value == "integer") {
        echo (is_integer($content) ? $value : "not" . $value);
    }elseif ($value == "bool") {
        echo (is_bool($content) ? $value : "not" . $value);
    } elseif ($value == "string") {
        echo (is_string($content) ? $value : "not" . $value);
    } elseif ($value == "array") {
        echo (is_array($content) ? $value : "not" . $value);
    } elseif ($value== "object") {
        echo (is_object($content) ? $value : "not" . $value);
    } elseif ($value == "string|integer|float") {
        echo (is_float($content) || is_string($content) || is_integer($content) ? $value : "not" . $value);
    } else {
        echo "go somehwere.";
    }

} elseif ($key == "contains") {
    $rulesval = array_values($rules);
    $bool = strpos($content, $rulesval[0]);
    echo ($bool !== false ? "pass" . $key : "fail" . $key);
} else {
    echo "nothing here";
}
}   


?>