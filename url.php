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
	} else if (is_short($url) === true) {
		echo 'error_is_short';
	} else {
//	Could probably make this stuff slightly more secure
		while (!code_exists($code = gen_code())) {
		shorten($url, $code);
		echo $url_base . $code;
		break 1;
		}
	}
	
}
?>