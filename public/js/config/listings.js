config.listings = {};

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