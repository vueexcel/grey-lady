config.listings = {};

 
config.listings.get = {}
config.listings.get.datatable = {}
config.listings.get.url = 'https://gulshan.app.greyladyproject.com/api/v1/listings';
config.listings.get.datatable_id = 'listing-datatable';


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
          var cap_rate = '';
          for( var i=0; i< json.items.length; i++){
          	if (json.items[i].calculated_fields[0]) {
          		cap_rate = json.items[i].calculated_fields[0].financial_information.cap_rate;
          	}
          	// console.log(json.items[i].calculated_fields[0].financial_information);
            return_data.push({
              'date_added': formatDate(json.items[i].listing_information.createdAt),
              'address': json.items[i].listing_information.address,
              'sqft': json.items[i].listing_information.area,
              'beds': json.items[i].listing_information.maxBed,
              'cap_rate': formatPercentage(cap_rate),
              'price': json.items[i].listing_information.price,
              'zip': json.items[i].listing_information.zip,
              'link': '<a href="http://trulia.com' + json.items[i].listing_information.link + '">Link</a>'
            })
          }
          return return_data;
        }
      };


config.listings.columns =  [ 'link', 'zip', 'price', 'cap_rate', 'beds', 'sqft', 'address', 'date_added'];

config.listings.search_params = {
	'zip': {
		'param' : 'zip',
		'type'	: 'textfield',
		'label'	: 'Zip',
		'placeholder' : '',
		'value' : '22101'
	},
	'capRate': {
		'param' : 'capRate',
		'type'	: 'textfield',
		'label'	: 'Cap Rate',
		'placeholder' : '',
		'value' : ''
	},
	'cashOnCash': {
		'param' : 'cashOnCash',
		'type'	: 'textfield',
		'label'	: 'Cash on cash',
		'placeholder' : '',
		'value' : ''
	},
	'rentToValue': {
		'param' : 'rentToValue',
		'type'	: 'textfield',
		'label'	: 'Rent to value',
		'placeholder' : '',
		'value' : ''
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
