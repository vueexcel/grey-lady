config.listings = {};

 
config.listings.get = {}
config.listings.get.datatable = {}
config.listings.get.url = 'https://gulshan.app.greyladyproject.com/api/v1/listings';
config.listings.get.datatable_id = 'listing-datatable';


config.listings.get.get_search_form = function (d) {
	var current_state_of_form = $('#listings_search_form').serializeArray();
	// var query_to_return = '';
	// query_to_return += '?type=sell';

	d.type = 'sell';
	
	// console.log(current_state_of_form);

	// for (var i = current_state_of_form.length - 1; i >= 0; i--) {
	// 	query_to_return += '&' + current_state_of_form[i].name + '=' + current_state_of_form[i].value; 
	// }

	console.log(d);
	// return query_to_return;
	// return '?zip=01603&type=sell&minBed=3&maxBed=3';
}


// config.listings.get.get_search_form = function () {

// }

config.listings.ajax = {
        'url': config.listings.get.url,
        'data': function (d) {
        	var current_state_of_form = $('#listings_search_form').serializeArray();
        	
        	console.log(current_state_of_form);

        	for (var i = current_state_of_form.length - 1; i >= 0; i--) {
        		d[current_state_of_form[i].name] = current_state_of_form[i].value;
			}

			console.log(d);

        },
        'cache' : false,
        'dataSrc'     : function (json) {
          var return_data = new Array();
          for( var i=0; i< json.items.length; i++){
            return_data.push({
              'date_added': json.items[i].listing_information.createdAt,
              'address': json.items[i].listing_information.address,
              'sqft': json.items[i].listing_information.area,
              'beds': json.items[i].listing_information.maxBed,
              'baths': json.items[i].listing_information.baths,
              'price': json.items[i].listing_information.price,
              'zip': json.items[i].listing_information.zip,
              'link': '<a href="http://trulia.com' + json.items[i].listing_information.link + '">Link</a>'
            })
          }
          return return_data;
        }
      };


config.listings.columns =  [ 'link', 'zip', 'price', 'baths', 'beds', 'sqft', 'address', 'date_added'];

config.listings.search_params = {
	'zip': {
		'param' : 'zip',
		'type'	: 'textfield',
		'label'	: 'Zip',
		'placeholder' : '',
		'value' : '22101'
	},
	'maxBeds': {
		'param' : 'maxBeds',
		'type'	: 'textfield',
		'label'	: 'Max Beds',
		'placeholder' : '',
		'value' : ''
	},
	'minBeds': {
		'param' : 'minBeds',
		'type'	: 'textfield',
		'label'	: 'Min Beds',
		'placeholder' : '',
		'value' : ''
	},
	'sell': {
		'param' : 'type',
		'type'	: 'dropdown',
		'options' : [
			{
				'id' : 'sell',
				'text' : 'For Sale',
				'value' : 'sale',
				'selected' : true
			},
			{
				'id' : 'rent',
				'text' : 'For Rent',
				'value' : 'rent',
				'selected' : false
			}
		],
		'label'	: 'Property Type',
		'placeholder' : ''
	},
	'minPrice': {
		'param' : 'minPrice',
		'type'	: 'textfield',
		'label'	: 'Min Price',
		'placeholder' : '',
		'value' : ''
	},
	'maxPrice': {
		'param' : 'minPrice',
		'type'	: 'textfield',
		'label'	: 'Max Price',
		'placeholder' : '',
		'value' : ''
	}
}
