$( function () {

	config.zips.columns =  [ 'actions', 'watchlist', 'cap by bed', 'area', 'zip'];
		config.zips.ajax.dataSrc = function (json) {
	      var return_data = new Array();
	      for( var i=0; i< json.length; i++){
	        return_data.push({
	          // 'date_added': formatDate(json[i].createdAt),
	          'zip': '<a target=_Blank href="/explore/'+json[i].details.zip+'">' + json[i].details.zip + '</a>',
	          'area': '<a target=_Blank href="/explore/?town=' + json[i].details.place_name + '&stateAbbreviation=' + json[i].details.state_abbreviation + '" >' + json[i].details.place_name + ', ' + json[i].details.state_abbreviation + '</a>',
	          'cap by bed': formatZipCalculations(json[i]),
	          'watchlist' : makeWatchListButtons(json[i]),
	          'actions': config.zips.get.actions_column(json[i])
	        })
	      }
	      return return_data;
	    }

	config.zips.get.actions_column = function (zip_item) {
	  var html_to_return = '';
	  html_to_return += '<a type="button" class="btn btn-default" href="/explore/' + zip_item.details.zip + '">Details</a>';
	  // html_to_return += '<a type="button" class="btn btn-default" href="#' + zip_item.details.zip + '">+Fav</a>';
	  html_to_return += makeDropDownButton('API', [
	    {
	      'text' : 'Zip Details',
	      'link' : '//api.greyladyproject.com/api/v1/zip?zip=' + zip_item.details.zip,
	    },
	    {
	      'text' : 'Recalculate Zip',
	      'link' : '//api.greyladyproject.com/api/v1/recalculate/zips?zip='  + zip_item.details.zip,
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

  //render the search form. 
  renderSearchForm('zips', 'get', '#zips-search-form');	

  //Initialize Select2 Elements
  // $('.select2').select2()

  createDataTable('zips');

});


