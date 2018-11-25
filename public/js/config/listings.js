config.listings = {};

 
 //base objects
config.listings.get = {}
config.listings.details = {}
config.listings.create = {}

// apis
config.listings.get.url = 'https://gulshan.app.greyladyproject.com/api/v1/listings';
config.listings.details.url = 'https://gulshan.app.greyladyproject.com/api/v1/listings';
config.listings.create.url = 'https://gulshan.app.greyladyproject.com/api/v1/listings';


config.listings.get.datatable = {}
config.listings.get.datatable_id = 'listing-datatable';


config.listings.create.search_params = {

	'type': {
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
	'address': {
		'param' : 'address',
		'type'	: 'textfield',
		'label'	: 'Address',
		'placeholder' : '',
		'value' : ''
	},
	'zip': {
		'param' : 'zip',
		'type'	: 'textfield',
		'label'	: 'Zip',
		'placeholder' : '',
		'value' : ''
	},
	'price': {
		'param' : 'price',
		'type'	: 'textfield',
		'label'	: 'Price',
		'placeholder' : '',
		'value' : ''
	},
	'beds': {
		'param' : 'bed',
		'type'	: 'textfield',
		'label'	: 'Beds',
		'placeholder' : '',
		'value' : ''
	},
	'bath': {
		'param' : 'bath',
		'type'	: 'textfield',
		'label'	: 'Beds',
		'placeholder' : '',
		'value' : ''
	},
	'area': {
		'param' : 'area',
		'type'	: 'textfield',
		'label'	: 'Sqft',
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
};


config.listings.get.actions_column = function (listing_item) {
	var html_to_return = '';
	console.log(listing_item);
	html_to_return += '<a type="button" class="btn btn-default" target=_blank href="http://trulia.com' + listing_item.listing_information.link + '">on Trulia</a>';
	html_to_return += '<a type="button" class="btn btn-default" target=_blank href="/listings/details?id=' + listing_item.listing_information.id + '&type=sell">Details</a>';
	return html_to_return;
}

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
              'actions': config.listings.get.actions_column(json.items[i]) 
            })
          }
          return return_data;
        }
      };


config.listings.columns =  [ 'actions', 'zip', 'price', 'cap_rate', 'beds', 'sqft', 'address', 'date_added'];

config.listings.get.search_params = {
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
