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
            
            return_data.push({
              'date_added': formatDate(json.items[i].createdAt),
              'address': json.items[i].details.location.address,
              'sqft': json.items[i].details.LivingArea,
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