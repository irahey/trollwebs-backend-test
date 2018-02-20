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
    $unixtime = mktime($bday);

?>