<?php
require 'vendor/autoload.php';

use Carbon\Carbon;

printf("Now: %s", Carbon::now());

mainmenu();
function mainmenu() {
    echo "\n";
    echo "Select from the following options" . "\n" ;
    echo "(a) Password hasher" . "\n" ;
    echo "(b) TIme difference" . "\n" ;
    echo "(c) Password generator" . "\n" ;
    echo "(d) Exit" . "\n" ;
    
    $handlemain = fopen ("php://stdin","r");
    $line = fgets($handlemain);
    if (trim($line) == 'a'){
        askpword(); 
    } elseif (trim($line) == 'b'){
        timediff(); 
    } elseif (trim($line) == 'c'){
        randomstr(); 
    } elseif (trim($line) == 'd'){
        echo "Bye!\n";
        exit; 
    }
    fclose($handlemain);
}

function askpword() {
    echo "Type password to hash:";
    $handleask = fopen ("php://stdin","r");
    $tohash = fgets($handleask);
    fclose($handleask);
    hasher($tohash);
    
}
function hasher() {
    $md5h = md5($tohash);
    $sha1 = sha1($tohash);
    echo "The md5 hash is " . $md5h . "\n" ." and the SHA1 hash is" . $sha1 . "\n";
    echo "\n"; 
    goback();

}
function goback() {
    echo "Do you want to go back to the main menu? yes/no \n";
    $handlegoback = fopen ("php://stdin","r");
    $yn = fgets($handlegoback);
    if(trim($yn) == 'no'){
        echo "Bye!\n";
        exit; 
    } elseif (trim($yn) == 'yes'){
        mainmenu();
    } else {
        echo "Say that again?\n";
        goback();
    }
    fclose($handlegoback);
}
function timediff() {
    echo "Please enter your birthday. ";
    echo "\n";
    echo "Year in YYYY". "\n" ;
    $handle1 = fopen ("php://stdin","r");
    $year = intval(fgets($handle1));

    if ($year > 2018) {
        echo "Please enter a past year. Try again.";
        echo "\n";
        timediff();
    }
    fclose($handle1);
    
    echo "Month in MM". "\n" ;
    $handle2 = fopen ("php://stdin","r");
    $month = intval(fgets($handle2));
    if (1 > $month && $month > 12) {
        echo "Invalid month. Try again.";
        echo "\n";
        timediff();
    }
    fclose($handle2);
    
    echo "Day in DD". "\n" ;
    $handle3 = fopen ("php://stdin","r");
    $day = intval(fgets($handle3));
    fclose($handle3);
    
    $check = checkdate($month, $day, $year);
    if ($check == FALSE ){
        echo "Invalid date. Try again. " . "\n";
        timediff();
    } 
    echo "\n";
    $here     = Carbon::now();
    $bday = Carbon::create($year, $month, $day);
    $unixtime = time($bday);
    echo "The UNIX timestamp for your birthdate is: " . $unixtime . "\n";
    echo "The current date is: " . date_format($here, 'Y-m-d') . "\n";
    echo "Your birthday is on: " . date_format($bday, 'Y-m-d') . "\n";
    echo "The time difference in human readable format: " . $here->diffForHumans($bday) . "\n" ;
    echo "\n";
    goback();
}


function randomstr() {
    echo "How long do you want your password to be? Select from 6 to 12." . "\n";
    $handlerandom = fopen ("php://stdin","r");
    $length = intval(fgets($handlerandom));
    //$alphaLength = intval($length);
    
    if ($length < 6){
        echo "Please select a password length from 6 to 12." . "\n";
        randomstr();
    } elseif ($length > 12){
        echo "Please select a password length from 6 to 12." . "\n";
        randomstr();
    }
    fclose($handlerandom);

    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $charactersLength = strlen($alphabet);
    $randomString = '';
    
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $alphabet[rand(0, $charactersLength - 1)];
    }
    
    echo "\n"; 
    echo $randomString;
    echo "\n";
    strtohash($randomString);

}
function strtohash() {
    echo "Do you want to see the MD5 and SHA1 hashes of the random password generated? yes/no" . "\n";
    $handlestrto = fopen ("php://stdin","r");
    $ans = fgets($handlestrto);
    if(trim($ans) == 'no'){
        goback();
    } elseif (trim($ans) == 'yes'){
        $tohash = $randomString;
        hasher($tohash);
    } else {
        echo "Say that again?\n";
        strtohash($randomString);
    }
    fclose($handlestrto);
    
}
?>