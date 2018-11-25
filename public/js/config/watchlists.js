config.watchlists = {};

 
config.watchlists.get = {}
config.watchlists.details = {}
config.watchlists.create = {}



config.watchlists.get.url = 'https://gulshan.app.greyladyproject.com/api/v1/watchlist';
config.watchlists.create.url = 'https://gulshan.app.greyladyproject.com/api/v1/watchlist';

config.watchlists.get.datatable = {}
config.watchlists.get.datatable_id = 'watchlists-datatable';


config.watchlists.create.search_params = {

	'zip': {
		'param' : 'zip',
		'type'	: 'textfield',
		'label'	: 'Zip',
		'placeholder' : '',
		'value' : ''
	},
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
		'label'	: 'Purchase Type',
		'placeholder' : ''
	},
	'nextRun': {
		'param' : 'nextRun',
		'type'	: 'dropdown',
		'options' : [
			{
				'id' : 'yes',
				'text' : 'Yes',
				'value' : 'true',
				'selected' : true
			},
			{
				'id' : 'no',
				'text' : 'No',
				'value' : 'false',
				'selected' : false
			}
		],
		'label'	: 'Add to next run?',
		'placeholder' : ''
	}
};


config.watchlists.get.actions_column = function (zip) {
	var html_to_return = '';
	html_to_return += '<a type="button" class="btn btn-block btn-default" target=_blank href="'+config.listings.get.url + '?type=sell&zip=' + zip + '">Listings in '+zip+'</a>';
	return html_to_return;
}

config.watchlists.ajax = {
        'url': config.watchlists.get.url,
        'data': function (d) {
        	var current_state_of_form = $('#watchlists_search_form').serializeArray();
        	
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
              'createdAt': formatDate(json[i].createdAt),
              'zip': json[i].zip,
              'type': json[i].type ? 'Yes' : 'No',
              'nextRun': json[i].nextRun,
              'lastCrawlTime': formatDate(json[i].lastCrawlTime),
              'actions': config.watchlists.get.actions_column(json[i].zip)
            })
          }
          return return_data;
        }
      };


config.watchlists.columns =  [ 'actions', 'lastCrawlTime', 'nextRun', 'type', 'zip', 'createdAt'];

config.watchlists.get.search_params = {
	'zip': {
		'param' : 'zip',
		'type'	: 'textfield',
		'label'	: 'Zip Code',
		'placeholder' : '',
		'value' : '22101'
	},
	'type': {
		'param' : 'type',
		'type'	: 'textfield',
		'label'	: 'type',
		'placeholder' : '',
		'value' : ''
	},
	'nextRun': {
		'param' : 'nextRun',
		'type'	: 'textfield',
		'label'	: 'Next Run?',
		'placeholder' : '',
		'value' : ''
	}
}
