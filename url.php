<?php

include_once('init.php');

if(isset($_POST['url'])) {
	
	// This recursive section is only to be TRIPLE sure that there is no SQL Injection or XSS
	$url = trim($_POST['url']);
	$url = htmlentities($url);
	$url = mysql_real_escape_string($url);
	
	if(empty($url)) {
		echo 'error_no_url';
	} else if (filter_var($url, FILTER_VALIDATE_URL) === false) {
		echo 'error_invalid_url';
	} else if (is_short($url, $base_url) === true) { // Is the url already shortened?
		echo 'error_is_short';
	} else {
//	Could probably make this stuff slightly more secure
		while (!code_exists($code = gen_code($short_charset, $short_length))) { // If the code doesn't already exist, generate one using the configured parameters
		shorten($url, $code);
		
		if($show_protocol == true) { // Has the user stated they want the http:// at the beginning of their shortened URL's?
		echo 'http://' . $base_url . '/' . $code;
		}
		if($show_protocol == false) {
		echo $base_url . '/' . $code;
		}
		break 1;
		}
	}
	
}
?>