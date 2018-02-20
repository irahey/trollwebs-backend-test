<?php
require 'vendor/autoload.php';

use Carbon\Carbon;

printf("Now: %s", Carbon::now());

mainmenu();
function mainmenu() {
    echo "\n";
    echo "Select from the following options" . "\n" ;
    echo "(a) Password hasher" . "\n" ;
    echo "(b) Date" . "\n" ;
    echo "(c) Password generator" . "\n" ;
    echo "(d) Exit" . "\n" ;
    
    $handle = fopen ("php://stdin","r");
    $line = fgets($handle);
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
    fclose($handle);
}

function askpword() {
    echo "Type password to hash:";
    $handle = fopen ("php://stdin","r");
    $tohash = fgets($handle);
    fclose($handle);
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
    $handle = fopen ("php://stdin","r");
    $yn = fgets($handle);
    if(trim($yn) == 'no'){
        echo "Bye!\n";
        exit; 
    } elseif (trim($yn) == 'yes'){
        mainmenu();
    } else {
        echo "Say that again?\n";
        goback();
    }
    fclose($handle);
}
function timediff() {
  
    
    echo "\n";
    $here     = Carbon::now();
    $unixtime = time($dt);
    echo "The UNIX timestamp for that date is: " . $unixtime . "\n";
    $there = Carbon::now('America/Vancouver');

    echo "The time in here is " . $here . PHP_EOL . "\n";
    echo "The time in Vancouver, Canada is " . $there . PHP_EOL . "\n";  
    echo "\n" . "Time difference between current location and Vancouver, Canada:" . "\n";
    //echo $here->diffForHumans($there) . PHP_EOL;
    $there->addSeconds($here->offset - $there->offset);
    echo $here->diffForHumans($there) . PHP_EOL;
    goback();
}



function randomstr() {
    echo "How long do you want your password to be? Select from 6 to 12." . "\n";
    $handle = fopen ("php://stdin","r");
    $length = fgets($handle);
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $charactersLength = strlen($alphabet);
    $randomString = '';
    $alphaLength = intval($length);
    for ($i = 0; $i < $alphaLength; $i++) {
        $randomString .= $alphabet[rand(0, $charactersLength - 1)];
    }
    fclose($handle);
    echo "\n"; 
    echo $randomString;
    echo "\n";
    strtohash($randomString);

}
function strtohash() {
    echo "Do you want to see the MD5 and SHA1 hashes of the random password generated? yes/no" . "\n";
    $handle = fopen ("php://stdin","r");
    $ans = fgets($handle);
    if(trim($ans) == 'no'){
        goback();
    } elseif (trim($ans) == 'yes'){
        $tohash = $randomString;
        hasher($tohash);
    } else {
        echo "Say that again?\n";
        strtohash($randomString);
    }
    fclose($handle);
    
}
?>