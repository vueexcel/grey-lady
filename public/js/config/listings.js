config.listings = {};

 
 //base objects
config.listings.get = {}
config.listings.details = {}
config.listings.create = {}

// apis
config.listings.get.url = 'https://api.greyladyproject.com/api/v1/listings';
config.listings.details.url = 'https://api.greyladyproject.com/api/v1/listings';
config.listings.create.url = 'https://api.greyladyproject.com/api/v1/listings';


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
				'value' : 'sell',
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
	// console.log(listing_item);

	html_to_return += makeDropDownButton('API Calls', [
	{
		'text': 'to Trulia',
		'link': 'http://trulia.com' + listing_item.source.source_link
	},
	{
		'text': 'Get Zip API',
		'link': '//api.greyladyproject.com/api/v1/zip?zip=' + listing_item.details.location.zip
	},
	]);

	html_to_return += '<a type="button" class="btn btn-default" target=_blank href="/listings/' + listing_item.id + '">Details</a>';
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
        headers: {
        	apiKey: 'eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ'
        },
        'cache' : false,
        'dataSrc'     : function (json) {
          var return_data = new Array();
          var cap_rate = '';
          var cash_on_cash = '';
          for( var i=0; i< json.items.length; i++){
          	if (json.items[i].calculated_fields[0]) {
          		cap_rate = json.items[i].calculated_fields[0].financial_information.cap_rate;
          	}

          	if (json.items[i].calculated_fields[0] && json.items[i].calculated_fields[0].financial_information.cash_on_cash) {
          		cash_on_cash = json.items[i].calculated_fields[0].financial_information.cash_on_cash;
          	} 

          	// console.log(json.items[i]);
            
            return_data.push({
              'date_added': formatDate(json.items[i].createdAt),
              'address': json.items[i].details.location.address,
              'sqft': json.items[i].details.livingArea,
              'beds': json.items[i].details.beds,
              'cap_rate': formatPercentage(cap_rate),
              'cash_on_cash': formatPercentage(cash_on_cash),
              'price': json.items[i].details.price,
              'zip': json.items[i].details.location.address,
              'actions': config.listings.get.actions_column(json.items[i]) 
            })
          }
          return return_data;
        }
      };


config.listings.columns =  [ 'actions', 'zip', 'price', 'cash_on_cash', 'cap_rate', 'beds', 'sqft', 'address', 'date_added'];
// config.listings.get.columns_defs =  [{ "width": "150px", "target": 0 }];
// config.listings.columns =  [ {'data':'actions', 'wdith': '200px'}, {'data':'zip'}, {'data':'price'}, {'data':'cash_on_cash'}, {'data':'cap_rate'}, {'data':'beds'}, {'data':'sqft'}, {'data':'address'}, {'data':'date_added'}];

config.listings.get.search_params = {
	'zip': {
		'param' : 'zip',
		'type'	: 'textfield',
		'label'	: 'Zip',
		'placeholder' : '',
		'value' : ''
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
	'maxBed': {
		'param' : 'maxBed',
		'type'	: 'textfield',
		'label'	: 'Max Beds',
		'placeholder' : '',
		'value' : ''
	},
	'minBed': {
		'param' : 'minBed',
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
				'value' : 'sell',
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
	},
	'limit': {
		'param' : 'limit',
		'type'	: 'textfield',
		'label'	: 'Limit',
		'placeholder' : '',
		'value' : '20'
	}

}
