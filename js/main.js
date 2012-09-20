/* This is a sample main js file for lib.be configurations with AJAX enabled.
*  This file also handles simple things like the animation for the about div.
*/


$('#about').hide(); // hide the 'about' section before the page has even fully loaded, could be problematic, needs to be tested
$('#url').focus(); // makes the cursor go straight to the input field, for speed

$(document).ready(function(){
$('.aboutbutton').click(function(){
	$('#about').slideToggle("400"); // .slideToggle() is used, although kind of useless, as .slideDown() could also be used
});
});


function go(url) {
	$.post('url.php', { url: url }, function(data) {      // start the 'data' callback function
		if (data == 'error_no_url') {
			// If the user did not submit a URL
			$('#message').html('<p class="error">You didn\'t submit a URL!</p>');
		} else if (data == 'error_invalid_url') {
			// If the URL entered was not a valid URL.
			$('#message').html('<p class="error">That\'s not a valid URL!</p>');
		} else if (data == 'error_is_short') {
			// If the URL entered is already a short link.
			$('#message').html('<p class="error">That\'s already a shortened URL!</p>');
		} else {
			// If there were no errors, we display the shortened URL
			$('#url').val(data);
			$('#url').select();
			$('#message').html('<p class="success">Here is your shortened URL!</p>')
		}
	});	// end of the 'data' callback function
} 

/* Since I have had issues with the blackberry browser, this little
*  bit just hides the 'slogan' text under the header, 
*  as I have had problems with it being mashed into the header.
*/
if( /BlackBerry/i.test(navigator.userAgent) ) {
	$('#header-p').html("<p></p>");
}