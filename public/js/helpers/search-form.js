function renderSearchForm (config_type, div_id) {
	if (!config && !config.listings && !config.listings.search_params) {
		return false;
	}

	var search_form_html = '';
	var search_params = config[config_type].search_params;

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

	search_form_html += '<div class="box-footer">';
	search_form_html += '<button type="submit" class="btn btn-primary">Search</button>';
	search_form_html += '</div>';

	$(div_id).html(search_form_html);

}	

function buildTextField (search_param_item) {
	var html_to_return = '';

	html_to_return += '<div class="form-group">'
	html_to_return += '<label>'+search_param_item.label+'</label>'
	html_to_return += '<input id="' + search_param_item.param + '" type="text" class="form-control" placeholder="'+search_param_item.placeholder+'">'
	html_to_return += '</div>'

	return html_to_return;


}

function buildDropDown (search_param_item) {

	var html_to_return = '';

	html_to_return += '<div class="form-group">'
	html_to_return += '<label>'+search_param_item.label+'</label>'
	html_to_return += '<select class="form-control select2" style="width: 100px;">'

	for (var i = search_param_item.options.length - 1; i >= 0; i--) {
		html_to_return += '<option>'+search_param_item.options[i].value +'</option>';
	}
	
	html_to_return += '</select>';
	html_to_return += '</div>';

	return html_to_return;

}