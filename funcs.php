<?php
include_once('init.php');
function clean($data) {
return mysql_real_escape_string($data);
}

function is_short($url, $base_url) {
// Make the base URL work with the preg_match function
	$base_url = explode( '.', $base_url);
	$base_url_1 = "/" . $base_url[0];
	$base_url_2 = "\.$base_url[1]/i";
	$base_url = $base_url_1 . $base_url_2;
	return (preg_match(trim($base_url), $url)) ? true : false; // "/jlib\.be/i"
}

function gen_code($short_charset, $short_length) {
	$charset = $short_charset;	//set of characters to gen the code from
	return substr(str_shuffle($charset), 0, $short_length);
	
}

function code_exists($code) {
	$code = clean($code);
	$sql = "SELECT COUNT(`id`) FROM `urls` WHERE `code`='$code' LIMIT 1";
	return (mysql_result(mysql_query($sql), 0) == 1) ? true : false;
}

function shorten($url, $code) {
	$url = clean($url);
	mysql_query("INSERT INTO `urls` VALUES ('', '$url', '$code', '0')");
}

function redirect($code) {
	$code = clean($code);
	if(code_exists($code)) {
		$sql = "SELECT `url` FROM `urls` WHERE `code`='$code'";
		$url = mysql_result(mysql_query($sql), 0, 'url');
		header("location: $url");
	}
	
}

function get_clicks($code) {
	$code = clean($code);
	$sql = "SELECT `clicks` FROM `urls` WHERE `code` = '{$code}'";
	$result = mysql_result(mysql_query($query), 0);
	return $result;
}

function click($code) {
	$clicks = get_clicks($code);
	$tot_clicks = $clicks + 1;
	$sql = "UPDATE `urls` SET `clicks` = '{$tot_clicks}' WHERE `code` = '{$code}'";
	mysql_query($sql);
}
?>