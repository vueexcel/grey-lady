config.listings.columns =  [ 'zip', 'price', 'cap_rate', 'beds', 'address', ];

config.listings.ajax.dataSrc = function (json) {
    var return_data = new Array();
    var cap_rate = '';
    // console.log(json);
    for( var i=0; i< json.items.length; i++){
      
      // console.log(json.items[i]);

      if (json.items[i].calculated_fields && json.items[i].calculated_fields[0]) {
        cap_rate = json.items[i].calculated_fields[0].financial_information.cap_rate;
      }
      
      return_data.push({
        'address': json.items[i].details.location.address,
        'beds': json.items[i].details.beds,
        'cap_rate': formatPercentage(cap_rate),
        'price': json.items[i].details.price,
        'zip': json.items[i].details.location.zip,
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
        'value' : 'sell',
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
  'limit': {
    'param' : 'limit',
    'type'  : 'textfield',
    'label' : 'Limit',
    'placeholder' : '',
    'value' : '20'
  }
}


$("#explore-details-recalc-all-stats").bind('click', function () {

  reCalculateAllBeds([1,2,3,4,5,6,7,8,9,10,11,12]);

});

function reCalculateAllBeds (beds_array) {

  console.log('function called');
  console.log(beds_array.length);
    

  
  if (beds_array.length > 0) {
    
    

    // var recalculate_listings_api = 'https://api.greyladyproject.com/api/v1/recalculate/listings?zip=' + explore_details_zip;
    var recalculate_listings_api = 'https://app.greyladyproject.com/api/secure?url=recalculate/listings&zip=' + explore_details_zip;
    recalculate_listings_api += '&minBed=' + beds_array[0];
    recalculate_listings_api += '&maxBed=' + beds_array[0];

    console.log(beds_array);
    console.log(recalculate_listings_api);

    beds_array.shift()

    $.get(recalculate_listings_api, reCalculateAllBeds(beds_array) );

  } else {

    console.log('triggering zip recalculation');

    setTimeout(function () {

      $.get('https://app.greyladyproject.com/api/secure?url=recalculate/zips?zip=' + explore_details_zip, function () {
        alert('recalculation worked! Reloading...');
        location.reload(true);
      });

    }, 1000)

    

  }
}