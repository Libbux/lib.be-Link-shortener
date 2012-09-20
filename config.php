<?php

/* Sample configuration file for the lib.be link shortener.
*  Feel free to use this as your real configuration file,
*  just change the values to suit your needs.
*
*/


// DATA SERVER CONNECTION & DATABASE CONFIG

	$db_host = "127.0.0.1"; // Defines the host of your data server
	$db_user = "user"; // Defines the user to be used for the connection to the data server
	$db_pass = "password"; // Defines the password to be used with the user defined above
	$db_name = "database"; // Defines the name of the database to be used. *IMPORTANT - the user defined above must have read & write permissions to this database*

// SITE CONFIG
	
	$url_base = 'lib.be'; // INCLUDE the "http://"
	$short_character_set = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$short_length = 6; //how many characters the short URL is
	
	$site_name = 'lib.be';
	$site_descrip = 'Lib.be is a link shortening service. Come shorten your links!';
	$about_info = 'Lib.be is an open source shortening engine, developed by Jonathan Libby';
	
	$contact_email = 'example@example.com';
	$contact_subject = 'Contact%20form';
	





?>