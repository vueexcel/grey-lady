config.listings.columns =  [ 'zip', 'price', 'cap_rate', 'beds', 'address', ];

config.listings.ajax.dataSrc = function (json) {
    var return_data = new Array();
    var cap_rate = '';
    for( var i=0; i< json.items.length; i++){
      
      console.log(json.items[i]);

      if (json.items[i].calculated_fields && json.items[i].calculated_fields[0]) {
        cap_rate = json.items[i].calculated_fields[0].financial_information.cap_rate;
      }

      
      return_data.push({
        'address': json.items[i].listing_information.address,
        'beds': json.items[i].listing_information.maxBed,
        'cap_rate': formatPercentage(cap_rate),
        'price': json.items[i].listing_information.price,
        'zip': json.items[i].listing_information.zip,
        // 'actions': config.listings.get.actions_column(json.items[i]) 
      })
    }
    return return_data;
  }

config.listings.get.search_params = {

  'sell': {
    'param' : 'type',
    'type'  : 'dropdown',
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
    'label' : 'Property Type',
    'placeholder' : ''
  },
  'zip': {
    'param' : 'zip',
    'type'  : 'textfield',
    'label' : 'Zip',
    'placeholder' : '',
    'value' : explore_details_zip
  },
}


$("#explore-details-recalc-all-stats").bind('click', function () {
   $.get('https://gulshan.app.greyladyproject.com/api/v1/recalculate/listings?zip=' + explore_details_zip, function(data) {
     
      $.get('https://gulshan.app.greyladyproject.com/api/v1/recalculate/zips?zip=' + explore_details_zip, function(data) {
        
        alert('recalculation worked! Reloading...');
        location.reload(true);


      });

   });

});