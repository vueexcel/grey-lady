config.favoritezips = {};

 
config.favoritezips.get = {}
config.favoritezips.create = {}
config.favoritezips.details = {}
config.favoritezips.update = {}
config.favoritezips.delete = {}

config.favoritezips.get.url = '/api/favoritezips';
config.favoritezips.create.url = '/api/favoritezips';
config.favoritezips.details.url = '/api/favoritezips';
config.favoritezips.update.url = '/api/favoritezips';
config.favoritezips.delete.url = '/api/favoritezips';

config.favoritezips.get.datatable = {}
config.favoritezips.get.datatable_id = 'favoritezips-datatable';

config.favoritezips.create.search_params = {}


config.favoritezips.get.actions_column = function (zip_item) {
	var html_to_return = '';
	html_to_return += '<a type="button" class="btn btn-default" target=_blank href="/listings/details?id=' + zip_item.zip_code + '">Details</a>';
	html_to_return += makeDropDownButton('API Calls', [
		{
			'text' : 'Zip Details',
			'link' : '//gulshan.app.greyladyproject.com/api/v1/zip?zip=' + zip_item.zip_code,
		},
		{
			'text' : 'Recalculate Zip',
			'link' : '//gulshan.app.greyladyproject.com/api/v1/recalculate/zips?zip='  + zip_item.zip_code,
		},
		{
			'text' : 'Recalculate Zip Listings',
			'link' : '//gulshan.app.greyladyproject.com/api/v1/recalculate/listings?zip='  + zip_item.zip_code,
		},
		{
			'text' : 'Listing Rent Search',
			'link' : '//gulshan.app.greyladyproject.com/api/v1/listings?type=rent&zip='  + zip_item.zip_code,
		},
		{
			'text' : 'Listing Sell Search',
			'link' : '//gulshan.app.greyladyproject.com/api/v1/listings?type=sell&zip='  + zip_item.zip_code,
		},
		{
			'text' : 'Average Rent',
			'link' : '//gulshan.app.greyladyproject.com/api/v1/report?zip='  + zip_item.zip_code,
		},
		{
			'text' : 'Search Watchlists',
			'link' : '//gulshan.app.greyladyproject.com/api/v1/watchlist?zip='  + zip_item.zip_code,
		},
	])

	return html_to_return;
}

config.favoritezips.ajax = {
        'url': config.favoritezips.get.url,
        'data': function (d) {
        	// var current_state_of_form = $('#zips_search_form').serializeArray();

   //      	for (var i = current_state_of_form.length - 1; i >= 0; i--) {
   //      		d[current_state_of_form[i].name] = current_state_of_form[i].value;
			// }
        },
        'cache' : false,
        'dataSrc'     : function (json) {
          var return_data = new Array();
          console.log('==============RESPONSE============');
          console.log(json);
          console.log('================');
          var favoritezips = json.data;
          console.log(favoritezips)
          for( var i=0; i< favoritezips.length; i++){
          	// console.log(favoritezips[i])
            return_data.push({
              'date_added': formatDate(favoritezips[i].createdAt),
              'zip_code_town': favoritezips[i].zip_code_town,
              'zip_code': favoritezips[i].zip_code,
              'actions': config.favoritezips.get.actions_column(favoritezips[i])
            })
          }
          return return_data;
        }
      };


config.favoritezips.columns =  [ 'actions',  'zip_code', 'zip_code_town', 'date_added'];

config.favoritezips.get.search_params = {}
