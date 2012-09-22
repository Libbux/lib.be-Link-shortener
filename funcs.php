<?php

function clean($data) {
return htmlentities(mysql_real_escape_string($data));
}

function is_short($url) {
	return (preg_match($url_base, $url)) ? true : false; // "/jlib\.be/i"
}

function gen_code() {
	$charset = $short_character_set;	//set of characters to gen the code from
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