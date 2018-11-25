function renderSearchForm (config_type, request_type, div_id) {
	

	if (!config && !config.listings && !config.listings.search_params) {
		return false;
	}

	var search_form_html = '';
	var search_params = config[config_type][request_type].search_params;

	console.log(search_params);

	search_form_html += '<form id="' + config_type + '_search_form" >';

	for (var item in search_params ) {

		switch (search_params[item].type) {

			case 'textfield':

			search_form_html += buildTextField(search_params[item]);
			
			break;


			case 'dropdown':

			search_form_html += buildDropDown(search_params[item]);
			break;

		}		
	}

	search_form_html += '<div class="form-group">';
	search_form_html += '<button type="submit" id="'+config_type+'_search_button" class="btn btn-primary">Search</button>';
	search_form_html += '</div>';
	search_form_html += '</form>';

	console.log('====================')
	console.log(search_form_html);
	console.log('====================')

	$(div_id).html(search_form_html);

	if (request_type == 'GET') {

		$('#' + config_type + '_search_button').bind('click', function () {
		
			config[config_type].get.datatable.ajax.reload();
			event.preventDefault();
		});

	}

	

}

function getSearchFormState (config_type) {
	return $('#' + config_type + '_search_form').serializeArray();
}

function buildTextField (search_param_item) {
	var html_to_return = '';

	html_to_return += '<div class="form-group">'
	html_to_return += '<label>'+search_param_item.label+'</label>'
	html_to_return += '<input id="' + search_param_item.param + '" name="' + search_param_item.param + '" type="text" class="form-control" placeholder="'+search_param_item.placeholder+'" value="'+search_param_item.value +'">'
	html_to_return += '</div>'

	return html_to_return;


}

function buildDropDown (search_param_item) {

	var html_to_return = '';

	html_to_return += '<div class="form-group">'
	html_to_return += '<label>'+search_param_item.label+'</label>'
	html_to_return += '<select class="form-control select2" name="' + search_param_item.param + '">'

	for (var i = search_param_item.options.length - 1; i >= 0; i--) {
		if (search_param_item.options[i].selected) {
			html_to_return += '<option value="'+search_param_item.options[i].value +'" selected>'+search_param_item.options[i].text +'</option>';
		} else {
			html_to_return += '<option value="'+search_param_item.options[i].value +'">'+search_param_item.options[i].text +'</option>';	
		}
		
	}
	
	html_to_return += '</select>';
	html_to_return += '</div>';

	return html_to_return;

}