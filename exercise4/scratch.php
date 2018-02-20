<?php
require 'vendor/autoload.php';

use Carbon\Carbon;

printf("Now: %s", Carbon::now());
echo "\n";
  echo "Enter your birthday" . "\n" ;
    echo "Year in YYYY". "\n" ;
    //type more valid date formats: https://secure.php.net/manual/en/datetime.formats.date.php
    $handle = fopen ("php://stdin","r");
    $year = fgets($handle);
    fclose($handle);
    echo "Month in MM". "\n" ;
    $handle = fopen ("php://stdin","r");
    $month = fgets($handle);
    fclose($handle);
    echo "Day in DD". "\n" ;
    $handle = fopen ("php://stdin","r");
    $day = fgets($handle);
    fclose($handle);
    $bday = checkdate($month, $day, $year);
    echo $bday;
    
    
    //$there = Carbon::now('America/Vancouver');

    //echo "The time in here is " . $here . PHP_EOL . "\n";
    //echo "The time in Vancouver, Canada is " . $there . PHP_EOL . "\n";  
    //echo "\n" . "Time difference between current location and Vancouver, Canada:" . "\n";
    //echo $here->diffForHumans($there) . PHP_EOL;
    //$there->addSeconds($here->offset - $there->offset);
    //echo $here->diffForHumans($there) . PHP_EOL;
    //$year = 1999;
    //$month = 9;
    //$day = 9;
    //$bday = Carbon::create($year, $month, $day);
    //$bday = date_create_from_format('d-m-Y', $day . '-' . $month . '-' . $year);
    //echo "\n" . date_format($bday, 'Y-m-d') . "\n";
    //$bdayc = Carbon::parse($bday);
    
    
function getAge(){
    return $this->birthdate->diff(Carbon::now())
         ->format('%y years, %m months and %d days');
}

?>