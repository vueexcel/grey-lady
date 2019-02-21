

$('#copy-and-close').on('click', function(event) {
	event.preventDefault();
	/* Act on the event */

	var text = '';
	text += 'Bug Report: \r\n \r\n';
	
	text += 'What was expected: \r\n \r\n';
	text += $('#expecting').val();

	text += 'What was what happened: \r\n \r\n';
	text += $('#happened').val();

	text += 'The request made: \r\n \r\n';
	text += $('#request').text();

	text += 'The response: \r\n \r\n';
	text += $('#response').text();

	$('#report-to-send').html(text);

	console.log($('#report-to-send').text());

	new ClipboardJS('.bug-reporter-button');



	// var el = document.createElement('textarea');
	// el.value = $('#request').html();
	// el.select();
	// document.execCommand("copy");
	// alert("Copied the text: " + el.value);
});