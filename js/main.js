$('#about').hide();

$('.aboutbutton').click(function(){
	$('#about').slideToggle("400");
});


$(document).ready(function(){
	$('#url').focus();
});

function go(url) {
	$.post('url.php', { url: url }, function(data) {
		if (data == 'error_no_url') {
			//no url
			$('#message').html('<p class="error">You didn\'t give us a URL!</p>');
		} else if (data == 'error_invalid_url') {
			//invalid url
			$('#message').html('<p class="error">That\'s not a valid URL!</p>');
		} else if (data == 'error_is_jlib') {
			//already a jlib link
			$('#message').html('<p class="error">That\'s already a jlib.be URL!</p>');
		} else {
			//no errors, display url
			$('#url').val(data);
			$('#url').select();
			$('#message').html('<p class="success">Here is your URL, simplified!</p>')
		}
	});	//end of the 'data' callback function
} 

//This little bit just stops the "short is simple" from getting mashed in with the title by getting rid of it completely.

if( /BlackBerry/i.test(navigator.userAgent) ) {
	$('#header-p').html("<p></p>");
}
