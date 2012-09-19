<?php
include_once('init.php');

if (isset($_GET['c']) && !empty($_GET['c'])) {
	$c = $_GET['c'];	//the code in the url
	if(!code_exists($c)) {
	header("location: /");
	}
	click($c);
	redirect($c);
	die();
}
?>
<!DOCTYPE html>
<html>
<head>

<title>jlib.be - Short is simple</title>
<link type="text/css" rel="stylesheet" href="style.css" />
<!-- desktop -->
<link type="text/css" rel="stylesheet" media="screen and (min-width:900px)" href="desktop.css" />
<!-- mobile -->
<link type="text/css" rel="stylesheet" media="screen and (min-width:0px) and (max-width:400px)" href="mobile.css" />

<link type="text/css" rel="stylesheet" media="screen and (min-width:401px) and (max-width:899px)" href="tablet.css" />


<!--Open Graph protocol stuff-->

<meta property="og:type"			content="website">
<meta property="og:title" 			content="Jlib.be - Short is simple">
<meta property="og:description"		content="Short is simple. Jlib.be simplifies links.">
<meta property="og:url"				content="http://jlib.be">
<meta property="og:image"			content="imgs/jlibbe.png">
<meta property="og:image:width"		content="180">
<meta property="og:image:height"	content="180">
<meta property="og:locale"			content="en_US">
</head>


<div id="wrapper">

<div id="header">
<a href=""><h1>jlib.be</h1>
<p id="header-p">Short is simple.</p></a>
</div>

<div id="content">

<div id="shorten">
<div id="message"><p class="">Enter a long URL, and we'll shorten it for you.</p></div>

<input type="text" name="url" id="url" onkeydown="if (event.keycode == 13 || event.which == 13) { go($('#url').val()); }" /> 
<a class="shortenButton" onclick="go($('#url').val());">Shorten!</a>
</div>




</div> <!--end of the content-->

<div id="footer">
<p>Handmade in Toronto by Jonathan Libby</p>
<div id="buttons">
<a class="aboutbutton">About</a>
<a class="contactbutton" href="mailto:jonathan.libby@yahoo.ca?subject=jlib.be%20user%20feedback">Contact</a>
</div>
</div>

<div id="about">
<p><strong>(c) Jonathan Libby, 2012</strong><br>
Jlib.be is a link shortening service provided by Jonathan Libby. By submitting a URL to Jlib.be, you agree to have your link
recorded by Jlib.be for purposes including and other than the shortening/redirection service provided. For questions or to contact, click the 'Contact' button
above.</p>
</div>


</div> <!--end of the wrapper-->
<p>&nbsp;</p>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<body>
</body>
</html>