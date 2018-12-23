config.zips = {};

 
config.zips.get = {}
config.zips.create = {}
config.zips.details = {}

config.zips.get.url = 'https://gulshan.app.greyladyproject.com/api/v1/zip';
config.zips.create.url = 'https://gulshan.app.greyladyproject.com/api/v1/zip';

config.zips.get.datatable = {}
config.zips.get.datatable_id = 'zips-datatable';

config.zips.create.search_params = {
	'zip': {
		'param' : 'zip',
		'type'	: 'textfield',
		'label'	: 'Zip',
		'placeholder' : '',
		'value' : ''
	},
	'place': {
		'param' : 'place',
		'type'	: 'textfield',
		'label'	: 'Town',
		'placeholder' : '',
		'value' : ''
	},
	'county': {
		'param' : 'county',
		'type'	: 'textfield',
		'label'	: 'County',
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
	'state': {
		'param' : 'state',
		'type'	: 'textfield',
		'label'	: 'State Name',
		'placeholder' : '',
		'value' : ''
	},
	'latitude': {
		'param' : 'latitude',
		'type'	: 'textfield',
		'label'	: 'Latitude',
		'placeholder' : '',
		'value' : ''
	},
	'longitude': {
		'param' : 'longitude',
		'type'	: 'textfield',
		'label'	: 'Longitude',
		'placeholder' : '',
		'value' : ''
	}
}


config.zips.get.actions_column = function (zip_item) {
	var html_to_return = '';
	html_to_return += '<a type="button" class="btn btn-default" target=_blank href="/listings/details?id=' + zip_item.zip + '">Details</a>';
	html_to_return += makeDropDownButton('API Calls', [
		{
			'text' : 'Zip Details',
			'link' : '//gulshan.app.greyladyproject.com/api/v1/zip?zip=' + zip_item.details.zip,
		},
		{
			'text' : 'Recalculate Zip',
			'link' : '//gulshan.app.greyladyproject.com/api/v1/recalculate/zips?zip='  + zip_item.details.zip,
		},
		{
			'text' : 'Recalculate Zip Listings',
			'link' : '//gulshan.app.greyladyproject.com/api/v1/recalculate/listings?zip='  + zip_item.details.zip,
		},
		{
			'text' : 'Listing Rent Search',
			'link' : '//gulshan.app.greyladyproject.com/api/v1/listings?type=rent&zip='  + zip_item.details.zip,
		},
		{
			'text' : 'Listing Sell Search',
			'link' : '//gulshan.app.greyladyproject.com/api/v1/listings?type=sell&zip='  + zip_item.details.zip,
		},
		{
			'text' : 'Average Rent',
			'link' : '//gulshan.app.greyladyproject.com/api/v1/report?zip='  + zip_item.details.zip,
		},
		{
			'text' : 'Search Watchlists',
			'link' : '//gulshan.app.greyladyproject.com/api/v1/watchlist?zip='  + zip_item.details.zip,
		},
	])

	return html_to_return;
}

config.zips.ajax = {
        'url': config.zips.get.url,
        'data': function (d) {
        	var current_state_of_form = $('#zips_search_form').serializeArray();

        	for (var i = current_state_of_form.length - 1; i >= 0; i--) {
        		d[current_state_of_form[i].name] = current_state_of_form[i].value;
			}
        },
        'cache' : false,
        'dataSrc'     : function (json) {
          var return_data = new Array();
          console.log('==============RESPONSE============');
          console.log(json);
          console.log('================');
          for( var i=0; i< json.length; i++){
            return_data.push({
              'date_added': formatDate(json[i].createdAt),
              'zip': json[i].details.zip,
              'town': json[i].details.place_name,
              'state': json[i].details.state_name,
              'lat': json[i].details.lat,
              'lng': json[i].details.lng,
              'actions': config.zips.get.actions_column(json[i])
            })
          }
          return return_data;
        }
      };


config.zips.columns =  [ 'actions',  'lng', 'lat', 'state', 'town', 'zip', 'date_added'];

config.zips.get.search_params = {
	'zip': {
		'param' : 'zip',
		'type'	: 'textfield',
		'label'	: 'Zip',
		'placeholder' : '',
		'value' : ''
	},
	'town': {
		'param' : 'place',
		'type'	: 'textfield',
		'label'	: 'Town',
		'placeholder' : '',
		'value' : 'Worcester'
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
	},
	'limit': {
		'param' : 'limit',
		'type'	: 'textfield',
		'label'	: 'Limit',
		'placeholder' : '',
		'value' : ''
	},
	'min_cap_rate': {
		'param' : 'min_cap_rate',
		'type'	: 'textfield',
		'label'	: 'Min Cap Rate',
		'placeholder' : '',
		'value' : ''
	},
	'cap_rate_beds': {
		'param' : 'cap_rate_beds',
		'type'	: 'textfield',
		'label'	: 'Cap Rate Beds',
		'placeholder' : '',
		'value' : ''
	}
}
