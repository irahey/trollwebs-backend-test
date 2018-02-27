<?php
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

$config =array(
		"base_url" => "https://irahey.000webhostapp.com/hybridauth/", 
		"providers" => array ( 
			//I wish to activate the Google login option but I could not do it with Google because I don't have a "paying" account with them. 
			//They do have a free trial but it still needs some credit card information though...
			"Google" => array ( 
				"enabled" => false,
				"keys"    => array ( "id" => "", "secret" => "" ), 
			),
			//Facebook may or may not work. I think it is because of the nature of the base_url domain. 000webhostapp is only a free service.
			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "784698141726175", "secret" => "47a171099a4d4435b6377dc7063d01e4" ), 
			),
			//Twitter is working
			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "7Q4qQIKlT6kjFBCt2PSEaM10u", "secret" => "J2BChOK47BIQE9O6YfPDUjlFfOCcanTwPr4lCysiQNz3cWGwmG" ),
			),
		),
		"debug_mode" => false,
		"debug_file" => "",
	);
