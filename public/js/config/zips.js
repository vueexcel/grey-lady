config.zips = {};

 
config.zips.get = {}
config.zips.get.datatable = {}
config.zips.get.url = 'https://gulshan.app.greyladyproject.com/api/v1/zip';
config.zips.get.datatable_id = 'zips-datatable';


config.zips.get.actions_column = function (zip_item) {
	var html_to_return = '';
	html_to_return += '<a type="button" class="btn btn-default" target=_blank href="'+config.listings.get.url + '?type=sell&zip=' + zip_item.zip + '">Listings in '+zip_item.zip+'</a>';
	html_to_return += '<a type="button" class="btn btn-default" target=_blank href="/listings/details?id=' + zip_item.zip + '">Details</a>';
	return html_to_return;
}

config.zips.ajax = {
        'url': config.zips.get.url,
        'data': function (d) {
        	var current_state_of_form = $('#zips_search_form').serializeArray();
        	
        	console.log(current_state_of_form);

        	for (var i = current_state_of_form.length - 1; i >= 0; i--) {
        		d[current_state_of_form[i].name] = current_state_of_form[i].value;
			}

			console.log(d);

        },
        'cache' : false,
        'dataSrc'     : function (json) {
          var return_data = new Array();
          for( var i=0; i< json.length; i++){
            return_data.push({
              'date_added': formatDate(json[i].createdAt),
              'zip': json[i].zip,
              'town': json[i].place,
              'state': json[i].state,
              'county': json[i].county,
              'latitude': json[i].latitude,
              'longitude': json[i].longitude,
              'actions': config.zips.get.actions_column(json[i])
            })
          }
          return return_data;
        }
      };


config.zips.columns =  [ 'actions',  'longitude', 'latitude', 'county', 'state', 'town', 'zip', 'date_added'];

config.zips.search_params = {
	'zip': {
		'param' : 'zip',
		'type'	: 'textfield',
		'label'	: 'Zip',
		'placeholder' : '',
		'value' : '22101'
	},
	'town': {
		'param' : 'place',
		'type'	: 'textfield',
		'label'	: 'Town',
		'placeholder' : '',
		'value' : ''
	},
	'stateAbbreviation': {
		'param' : 'stateAbbreviation',
		'type'	: 'textfield',
		'label'	: 'State Abbreviation',
		'placeholder' : '',
		'value' : ''
	},
	'county': {
		'param' : 'county',
		'type'	: 'textfield',
		'label'	: 'County',
		'placeholder' : '',
		'value' : ''
	}
}
