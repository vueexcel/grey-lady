config.favoritelistings = $.extend(true, {}, config.listings);

config.favoritelistings.get.datatable_id = 'favoritelistings-datatable';


config.favoritelistings.get.url = '/api/secure?url=listings&listing_ids=' + favorite_listing_ids;


config.favoritelistings.ajax = {
    'url': config.favoritelistings.get.url,
    headers: {
    	apiKey: 'eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ'
    },
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

        console.log(json.items[i].details);

        var full_address = json.items[i].details.location.address;
        full_address += ' ' + json.items[i].details.location.city;
        full_address += ', ' + json.items[i].details.location.state;
        
        return_data.push({
          'date_added': formatDate(json.items[i].createdAt),
          'address': full_address,
          'sqft': json.items[i].details.LivingArea ? json.items[i].details.LivingArea : 'n/a', 
          'beds': json.items[i].details.beds ? json.items[i].details.beds : 'n/a',
          'cap_rate': formatPercentage(cap_rate),
          'cash_on_cash': formatPercentage(cash_on_cash),
          'price': formatCurrency(json.items[i].details.price, 5),
          'zip': json.items[i].details.location.zip,
          'actions': config.favoritelistings.get.actions_column(json.items[i]) 
        })
      }
      return return_data;
    }
};

config.favoritelistings.get.actions_column = function (listing_item) {
  var html_to_return = '';
  
  html_to_return += '<a id="remove-favorite-listing" data-listingid="'+listing_item.id+'" type="button" class="btn btn-default" href="#">Remove Favorite</a>';
  html_to_return += '<a type="button" class="btn btn-default" target=_blank href="/scenario/run/' + listing_item.id + '">Run Scenario</a>';
  // html_to_return += '<a type="button" class="btn btn-default" target=_blank href="/listings/details?id=' + listing_item.id + '&type=sell">Details</a>';

  return html_to_return;
}