config.favoritelistings = $.extend(true, {}, config.listings);

config.favoritelistings.get.datatable_id = 'favoritelistings-datatable';

config.favoritelistings.columns =  [ 'actions', 'watchlist', 'cap by bed', 'area', 'zip'];

// console.log(favorite_zip_ids)
config.favoritelistings.get.url = '/api/secure?url=zip&listings_ids=' + favorite_zip_ids;

config.favoritelistings.ajax = {
        'url': config.favoritelistings.get.url,
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
		      'actions': config.listings.get.actions_column(json[i])
		    })
		  }
		  return return_data;
		}
      };

config.favoritelistings.get.actions_column = function (zip_item) {
  var html_to_return = '';
  html_to_return += '<a type="button" class="btn btn-default" href="/explore/' + zip_item.details.zip + '">Details</a>';
  html_to_return += '<a type="button" class="btn btn-default" href="#' + zip_item.details.zip + '">+Fav</a>';
  html_to_return += makeDropDownButton('API', [
    {
      'text' : 'Zip Details',
      'link' : '//api.greyladyproject.com/api/v1/zip?zip=' + zip_item.details.zip,
    },
    {
      'text' : 'Recalculate Zip',
      'link' : '//api.greyladyproject.com/api/v1/recalculate/listings?zip='  + zip_item.details.zip,
    },
    {
      'text' : 'Recalculate Zip Listings',
      'link' : '//api.greyladyproject.com/api/v1/recalculate/listings?zip='  + zip_item.details.zip,
    },
    {
      'text' : 'Listing Rent Search',
      'link' : '//api.greyladyproject.com/api/v1/listings?type=rent&zip='  + zip_item.details.zip,
    },
    {
      'text' : 'Listing Sell Search',
      'link' : '//api.greyladyproject.com/api/v1/listings?type=sell&zip='  + zip_item.details.zip,
    },
    {
      'text' : 'Average Rent',
      'link' : '//api.greyladyproject.com/api/v1/report?zip='  + zip_item.details.zip,
    },
    {
      'text' : 'Search Watchlists',
      'link' : '//api.greyladyproject.com/api/v1/watchlist?zip='  + zip_item.details.zip,
    },
  ])

  return html_to_return;
}