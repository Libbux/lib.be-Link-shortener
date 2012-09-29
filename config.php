<?php
include_once('init.php');
/* Sample configuration file for the lib.be link shortener.
*  Feel free to use this as your real configuration file,
*  just change the values to suit your needs.
*
*/


// DATA SERVER CONNECTION & DATABASE CONFIG

	$db_host = "localhost"; // Defines the host of your data server
	$db_user = "root"; // Defines the user to be used for the connection to the data server
	$db_pass = "pass"; // Defines the password to be used with the user defined above
	$db_name = "jlibbe"; // Defines the name of the database to be used. *IMPORTANT - the user defined above must have read & write permissions to this database*

// SITE CONFIG
	
	$base_url = 'lib.be'; // Defines the base URL for your shortened links. *IMPORTANT - OMIT the "http://" *
	$show_protocol = false; // Defines whether or not the links returned have the "http://" at the beginning of them - TRUE = "http://" included" - FALSE = "http://" omitted
	$short_charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // The set of letters & numbers from which the code will be generated
	$short_length = 6; // Defines how long the code on the end of the shortened URL is
	
	$site_name = 'lib.be'; // The name of this site, to be used with Open Graph Protocol (http://ogp.me)
	$site_descrip = 'Lib.be is a link shortening service. Come shorten your links!'; // A short site description, to be used with OGP (http://ogp.me)
	$about_info = 'Lib.be is an open source shortening engine, developed by Jonathan Libby'; // The info to be displayed in the 'about' area
	
	$contact_email = 'example@example.com'; // The email adress which "contact us" emails will be sent to
	$contact_subject = 'Contact%20form'; // The subject of "contact us" emails
?>