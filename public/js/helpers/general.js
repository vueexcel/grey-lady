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

function formatZipCalculations(zip_item) {

	var html_to_return = '';

	if (zip_item && zip_item.calculated_fields && zip_item.calculated_fields.by_beds) {
		for (beds in zip_item.calculated_fields.by_beds) {
			html_to_return +=  '<div class="precentage">';				
			html_to_return +=  '<span class="precentage-top">' + formatPercentage(zip_item.calculated_fields.by_beds[beds].average_cap_rate,1) + '</span>';				
			html_to_return +=  '<span class="precentage-bottom">' + beds + 'b</span>';				
			html_to_return +=  '</div>';				
		}
	}

	return html_to_return;

}