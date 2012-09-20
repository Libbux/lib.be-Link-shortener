<?php 
include_once('init.php');

if (isset($_GET['c']) && !empty($_GET['c'])) {
	$c = $_GET['c'];	//the code in the url
	if(!code_exists($c)) {
	header("location: /");
	}
	click($c);
	redirect($c);
	die(); // kill the script in case people have header() redirects turned off in their browser
}
?>
<!DOCTYPE html>
<html>
<head>

<!-- This is a sample page to demonstrate the lib.be shortening engine (with AJAX) -->

<title>The lib.be link shortener</title>
<link type="text/css" rel="stylesheet" href="style.css" />
<!-- Desktop -->
<link type="text/css" rel="stylesheet" media="screen and (min-width:900px)" href="desktop.css" />
<!-- Mobile -->
<link type="text/css" rel="stylesheet" media="screen and (min-width:0px) and (max-width:400px)" href="mobile.css" />
<!-- Tablet -->
<link type="text/css" rel="stylesheet" media="screen and (min-width:401px) and (max-width:899px)" href="tablet.css" />

<!--Open Graph protocol stuff-->

<meta property="og:type"			content="website">
<meta property="og:title" 			content="<?php echo $site_name; ?>">
<meta property="og:description"		content="My link shortener">
<meta property="og:url"				content="http://jlib.be">
<meta property="og:image"			content="imgs/image.png">
<meta property="og:image:width"		content="180">
<meta property="og:image:height"	content="180">
<meta property="og:locale"			content="en_US">
</head>


<div id="wrapper">

<div id="header">
<a href=""><h1>lib.be</h1>
<p id="header-p">Short. Simple. Smart.</p></a>
</div>

<div id="content">

<div id="shorten">
<div id="message"><p class="">Enter a URL to be shortened.</p></div>

<input type="text" name="url" id="url" onkeydown="if (event.keycode == 13 || event.which == 13) { go($('#url').val()); }" /> 
<a class="shortenButton" onclick="go($('#url').val());">Shorten!</a>
</div>

</div> <!--end of the content-->

<div id="footer">
<p>Handmade in Toronto by Jonathan Libby</p>
<div id="buttons">
<a class="aboutbutton">About</a>
<a class="contactbutton" href="mailto:<?php echo $contact_email; ?>?subject=<?php echo $contact_subject; ?>">Contact</a>
</div>
</div>

<div id="about">
<p><?php echo $about_info; ?></p>
</div>


</div> <!--end of the wrapper-->
<p>&nbsp;</p>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<body>
</body>
</html>