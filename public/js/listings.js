$( function () {


	//render the search form. 
	renderSearchForm('listings', '#listings-search-form');	

	//Initialize Select2 Elements
    $('.select2').select2()


	// render the datatable
    var listings_search_url = 'https://gulshan.app.greyladyproject.com/api/v1/listings';
    var search_parameters = '?zip=01603&type=sell&minBed=3&maxBed=3';

    listings_search_url = listings_search_url + search_parameters;

    $('#listing-datatable').DataTable({
        'ajax'        : {
        'url': listings_search_url,
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
      },
      'columns'    : [
        {'data': 'date_added'},
        {'data': 'address'},
        {'data': 'sqft'},
        {'data': 'beds'},
        {'data': 'baths'},
        {'data': 'price'},
        {'data': 'zip'},
        {'data': 'link'}
      ],
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'scrollCollapse' : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    });

});


