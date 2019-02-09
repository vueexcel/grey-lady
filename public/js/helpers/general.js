function formatDate (date_to_format) {

	if (date_to_format) {
		return moment(date_to_format.replace(/T/, ' ').replace(/\..+/, ''), '').fromNow()	
	} else {
		return 'n/a';
	}

}

function formatPercentage(number_to_format, digits = 3) {
	return " " + (Number(Math.round((number_to_format * 100)+'e' + digits)+'e-' + digits)) + "%";

}

function makeSourceLink( listing_item ) {

	var link;

	if (listing_item.source &&
	 	listing_item.source.source && 
	 	ValidURL(listing_item.source.source) && 
	 	listing_item.source.source_link
	 ) {
		link = listing_item.source.source + listing_item.source.source_link;
	} else {
		link = listing_item.source.source_link;
	}


	if ( (link.indexOf('http') == -1) && (link.indexOf('https') == -1)) {
		link = 'https://' + link;
	}

	return link;

}

function makeDropDownButton(main_button_text, dropdown_buttons) {

	var html_to_return = '';
	html_to_return += '<div class="btn-group">';
	html_to_return += '<button type="button" class="btn btn-default">'+main_button_text+'</button>';
	html_to_return += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
	html_to_return += '<span class="caret"></span>';
	html_to_return += '<span class="sr-only">Toggle Dropdown</span>';
	html_to_return += '</button>';
	html_to_return += '<ul class="dropdown-menu" role="menu">';

	for (var i = dropdown_buttons.length - 1; i >= 0; i--) {
		
		html_to_return += '<li><a target=_Blank href="'+dropdown_buttons[i].link+'">'+dropdown_buttons[i].text+'</a></li>';
	}

	html_to_return += '</ul>';	
	html_to_return += '</div>';	

	return html_to_return;
                
}

function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars[hash[0]] = hash[1];
    }
    return vars;
}

function ValidURL(str) {
  var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
    '(\\:\\d+)?(\/[-a-z\\d%_.~+]*)*'+ // port and path
    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
    '(\\#[-a-z\\d_]*)?$','i'); // fragment locater
  if(!pattern.test(str)) {
    alert("Please enter a valid URL.");
    return false;
  } else {
    return true;
  }
}