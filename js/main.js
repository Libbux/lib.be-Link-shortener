/* This is a sample main js file for lib.be configurations with AJAX enabled.
*  This file also handles simple things like the animation for the about div.
*/


$('#about').hide();
$('#url').focus();

$(document).ready(function(){
$('.aboutbutton').click(function(){
	$('#about').slideToggle("400");
});
});


function go(url) {
	$.post('url.php', { url: url }, function(data) {
		if (data == 'error_no_url') {
			//If the user did not submit a URL
			$('#message').html('<p class="error">You didn\'t give us a URL!</p>');
		} else if (data == 'error_invalid_url') {
			//If the URL entered was not a valid URL.
			$('#message').html('<p class="error">That\'s not a valid URL!</p>');
		} else if (data == 'error_is_short') {
			//If the URL entered is already a short link.
			$('#message').html('<p class="error">That\'s already a shortened URL!</p>');
		} else {
			//no errors, display url
			$('#url').val(data);
			$('#url').select();
			$('#message').html('<p class="success">Here is your shortened URL!</p>')
		}
	});	//end of the 'data' callback function
} 

//This little bit just stops the text under the title at the top from getting mashed in with the title by getting rid of it completely.

if( /BlackBerry/i.test(navigator.userAgent) ) {
	$('#header-p').html("<p></p>");
}
