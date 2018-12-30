config.favoritezips = $.extend(true, {}, config.zips);

config.favoritezips.get.datatable_id = 'favoritezips-datatable';

config.favoritezips.columns =  [ 'actions', 'watchlist', 'cap by bed', 'area', 'zip'];

// console.log(favorite_zip_ids)
config.favoritezips.get.url = '/api/secure?url=zip&zips_ids=' + favorite_zip_ids;

config.favoritezips.ajax = {
        'url': config.favoritezips.get.url,
        headers: {
        	apiKey: 'eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ'
        },
        'dataSrc'     : function (json) {
		  var return_data = new Array();
		  for( var i=0; i< json.length; i++){
		    return_data.push({
		      'zip': json[i].details.zip,
		      'area': json[i].details.place_name + ', ' + json[i].details.state_abbreviation,
		      'cap by bed': formatZipCalculations(json[i]),
		      'watchlist' : makeWatchListButtons(json[i]),
		      'actions': config.favoritezips.get.actions_column(json[i])
		    })
		  }
		  return return_data;
		}
      };

config.favoritezips.get.actions_column = function (zip_item) {
  var html_to_return = '';
  
  console.log(zip_item)

  html_to_return += '<a id="remove-favorite-zip" data-zipid="'+zip_item.details.id+'" type="button" class="btn btn-default" href="#">Remove</a>';
  html_to_return += '<a type="button" class="btn btn-default" href="/explore/' + zip_item.details.zip + '">Details</a>';
  

  return html_to_return;
}