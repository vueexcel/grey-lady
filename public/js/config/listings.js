config.listings = {};

 
config.listings.get = {}
config.listings.get.url = 'https://gulshan.app.greyladyproject.com/api/v1/listings' + '?zip=01603&type=sell&minBed=3&maxBed=3';
config.listings.get.datatable_id = 'listing-datatable';

config.listings.ajax = {
        'url': config.listings.get.url,
        'dataSrc'     : function (json) {
          var return_data = new Array();
          for( var i=0; i< json.items.length; i++){
            return_data.push({
              'date_added': moment().format(json.items[i].listing_information.createdAt),
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
		'placeholder' : ''
	},
	'maxBeds': {
		'param' : 'maxBeds',
		'type'	: 'textfield',
		'label'	: 'Max Beds',
		'placeholder' : ''
	},
	'minBeds': {
		'param' : 'maxBeds',
		'type'	: 'textfield',
		'label'	: 'Min Beds',
		'placeholder' : ''
	},
	'sell': {
		'param' : 'maxBeds',
		'type'	: 'dropdown',
		'options' : [
			{
				'id' : 'sell',
				'value' : 'For Sale'
			},
			{
				'id' : 'rent',
				'value' : 'For Rent'
			}
		],
		'label'	: 'Property Type',
		'placeholder' : ''
	},
	'minPrice': {
		'param' : 'minPrice',
		'type'	: 'textfield',
		'label'	: 'Min Price',
		'placeholder' : ''
	},
	'maxPrice': {
		'param' : 'minPrice',
		'type'	: 'textfield',
		'label'	: 'Max Price',
		'placeholder' : ''
	}
}