<?php
// Get the necessary vars
include('config.php');

// Establish a connection
mysql_connect($db_host, $db_user, $db_pass) or die("Could not connect - " . mysql_error);
mysql_select_db($db_name);

// Files to include
include_once('funcs.php');
include_once('url.php');
?>