<?php
include_once('init.php'); // Include the initialization file
function clean($data) { // Just a shorthand for using mysql_real_escape_string()
return mysql_real_escape_string($data); // Return the escaped data
}

function is_short($url, $base_url) {
// Make the base URL work with the preg_match function
	$base_url = explode( '.', $base_url); // Explode it into an array
	$base_url_1 = "/" . $base_url[0]; // Access the array created above
	$base_url_2 = "\.$base_url[1]/i"; // Access the array created above (again)
	$base_url = $base_url_1 . $base_url_2; // Concatenate the first and second elements of the array created above
	return (preg_match(trim($base_url), $url)) ? true : false; // return true or false on whether the URL is already short or not
}

function gen_code($short_charset, $short_length) {
	$charset = $short_charset;	//set of characters to gen the code from ($short_charset & $short_length defined in config.php)
	$start_char = 0; // Set a starting character position for the string to be shuffled from
	return substr(str_shuffle($charset), $start_char, $short_length); // Return a code which has been shuffled
	
}

function code_exists($code) { // To check if a generated code already exists in the db
	$code = clean($code); // Sanitize the data (excape the data)
	$sql = "SELECT COUNT(`id`) FROM `urls` WHERE `code`='$code' LIMIT 1"; // SQL statement to count how many rows have the given generated code in them
	return (mysql_result(mysql_query($sql), 0) == 1) ? true : false; // Run the query and return true or false depending on whether the code is in the db or not
}

function shorten($url, $code) { // To add the code and base URL to the db as one shortened URL
	$url = clean($url); // Sanitize the data, even though it does not need to be sanitized. (Possible performance issue?)
	mysql_query("INSERT INTO `urls` VALUES ('', '$url', '$code', '0')"); // Run the query (insert the URL into the db)
}

function redirect($code) { // To fetch the 
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