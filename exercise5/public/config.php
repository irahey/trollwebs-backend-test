<?php
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------
$config =array(
		"base_url" => "https://php-irahey.c9users.io/trollwebs-backend-test/exercise5/public/hybridauth/index.php", 
		"providers" => array ( 

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "AIzaSyD8d3_r2hJ370jE92QZxY2tFPyAd55SYwY", "secret" => "397384889462-g975fgnfg7id61anump0sapkt6nvc8ln.apps.googleusercontent.com" ), 
			),

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "784698141726175", "secret" => "47a171099a4d4435b6377dc7063d01e4" ), 
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "7Q4qQIKlT6kjFBCt2PSEaM10u", "secret" => "J2BChOK47BIQE9O6YfPDUjlFfOCcanTwPr4lCysiQNz3cWGwmG" ),
			),
		),
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,
		"debug_file" => "",
	);
