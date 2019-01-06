renderJumpTo();

function renderJumpTo () {

  console.log('worked');

	var listing = api_listing_information;
	var location = api_listing_information.details.location;
	var html = '';

  	html += '<select class="form-control select2" id="portal-jump-to" name="jumpTo">';
  	html += '<option value="">Jump to....</option>';

  	var base_greylady_url = '//app.greyladyproject.com';
  	var base_zillow_url = 'https://zillow.com';
  	var base_trulia_url = 'https://trulia.com';
  	var base_redfin_url = 'https://redfin.com';
  	var base_realtor_url = 'https://realtor.com';
  	var base_google_url = 'https://www.google.com/search?q=';

  	var searches = {};
  	searches.app = {};
  	searches.redfin = {};
  	searches.trulia = {};
  	searches.zillow = {};
  	searches.realtor = {};
  	searches.google = {};

  	searches.app.label = 'In App';
  	searches.google.label = 'Search Google';
  	searches.redfin.label = 'On Redfin';
  	searches.trulia.label = 'On Trulia';
  	searches.zillow.label = 'On Zillow';
  	searches.realtor.label = 'On Realtor';

  	searches.app.options = [];
  	searches.redfin.options = [];
  	searches.trulia.options = [];
  	searches.zillow.options = [];
  	searches.realtor.options = [];
  	searches.google.options = [];

  	searches.app.options.push({label: location.zip + ' + ' + listing.details.beds +' beds + Rentals', url: base_greylady_url + "/listings?zip=" + location.zip + "&minBed=" + listing.details.beds + "&maxBed=" + listing.details.beds + "&type=rent"});
  	searches.app.options.push({label: location.zip + ' + ' + listing.details.beds +' beds + Sales', url: base_greylady_url + "/listings?zip=" + location.zip + "&minBed=" + listing.details.beds + "&maxBed=" + listing.details.beds + "&type=sell"});
	searches.app.options.push({label: location.zip + ' + ' + listing.details.beds +' beds', url: base_greylady_url + "/listings?zip=" + location.zip + "&minBed=" + listing.details.beds + "&maxBed=" + listing.details.beds});
	searches.app.options.push({label: location.zip, url: base_greylady_url + "/listings?zip=" + location.zip});
  	searches.app.options.push({label: 'Listing: ' + location.address, url: base_greylady_url + "listing/" + listing.id});

  	
  	//https://www.redfin.com/zipcode/01604/filter/min-beds=3,max-beds=3
  	searches.redfin.options.push({label: location.zip + ' + ' + listing.details.beds +' beds + For Sale', url: base_redfin_url + "/zipcode/" + location.zip + "/filter/min-beds=" + listing.details.beds + ",max-beds=" + listing.details.beds});
	searches.redfin.options.push({label: location.zip, url: base_redfin_url + "/zipcode/" + location.zip});
	searches.redfin.options.push({label: 'Listing: ' + location.address, url: base_google_url + "redfin.com " + location.address + " " + location.zip });
  	

  	// /https://www.zillow.com/homes/01604_rb/3-_beds/
  	// https://www.zillow.com/homes/for_rent/01604_rb/3-_beds/
  	// https://www.zillow.com/homes/for_sale/01604_rb/3-_beds/
  	searches.zillow.options.push({label: location.zip + ' + ' + listing.details.beds +' beds + Rentals', url: base_zillow_url + "/homes/for_rent/01604_" + location.zip + "/" + listing.details.beds + "-_beds/"});
  	searches.zillow.options.push({label: location.zip + ' + ' + listing.details.beds +' beds + For Sale', url: base_zillow_url + "/homes/for_sale/01604_" + location.zip + "/" + listing.details.beds + "-_beds/"});
  	searches.zillow.options.push({label: location.zip + ' + ' + listing.details.beds +' beds + All', url: base_zillow_url + "/homes/01604_" + location.zip + "/" + listing.details.beds + "-_beds/"});
	searches.zillow.options.push({label: location.zip, url: base_zillow_url + "/homes/01604_" + location.zip + "/"});
	searches.zillow.options.push({label: 'Listing: ' + location.address, url: base_google_url + "zillow.com " + location.address + " " + location.zip });
  	
	
	// https://www.trulia.com/for_sale/01604_zip/3p_beds/
	// https://www.trulia.com/for_rent/01604_zip/3_beds/
	searches.trulia.options.push({label: location.zip + ' + ' + listing.details.beds +' beds + For Rent', url: base_trulia_url + "/for_rent/" + location.zip + "_zip/" + listing.details.beds + "_beds/"});
	searches.trulia.options.push({label: location.zip + ' + ' + listing.details.beds +' beds + For Sale', url: base_trulia_url + "/for_sale/" + location.zip + "_zip/" + listing.details.beds + "_beds/"});
	searches.trulia.options.push({label: location.zip, url: base_trulia_url + "/for_sale/" + location.zip + "_zip/"});
	searches.trulia.options.push({label: 'Listing: ' + location.address, url: base_google_url + "trulia.com " + location.address + " " + location.zip });

	// https://www.realtor.com/realestateandhomes-search/01604/beds-3-3
	// https://www.realtor.com/apartments/01604/beds-3-3
	searches.realtor.options.push({label: location.zip + ' + ' + listing.details.beds +' beds + For Rent', url: base_realtor_url + "/apartments/" + location.zip + "/beds-" + listing.details.beds + "-" + listing.details.beds});
	searches.realtor.options.push({label: location.zip + ' + ' + listing.details.beds +' beds + For Sale', url: base_realtor_url + "/realestateandhomes-search/" + location.zip + "/beds-" + listing.details.beds + "-" + listing.details.beds});
	searches.realtor.options.push({label: location.zip, url: base_realtor_url + "/apartments/" + location.zip});
	searches.realtor.options.push({label: 'Listing: ' + location.address, url: base_google_url + "realtor.com " + location.address + " " + location.zip });

	searches.google.options.push({label: 'Schools in ' + location.zip, url: base_google_url + "Shools ranking in " + location.zip });
	searches.google.options.push({label: 'Listing Agent', url: base_google_url + "real estate agent " + listing.details.ListAgentFirstName + ' ' + listing.details.ListAgentLastName + ' ' + location.zip});
	searches.google.options.push({label: 'Mortgage in ' + location.zip, url: base_google_url + "real estate lending in " + location.zip});
	searches.google.options.push({label: 'Mortgage in ' + location.city, url: base_google_url + "real estate lending in " + location.city});
	searches.google.options.push({label: 'Property Managers in ' + location.city, url: base_google_url + "property managers in " + location.city});


  	for ( portal in searches ) {

  		html += '<optgroup label="' + searches[portal].label + '">';

  		for (var i = searches[portal].options.length - 1; i >= 0; i--) {

  			html += '<option value="' + searches[portal].options[i].url + '">' + searches[portal].options[i].label + '</option>';

  		}


  		html += '</optgroup>';

  	}

  	console.log(html);

	document.getElementById('jump-to-wrapper').innerHTML = html;	

	$('#portal-jump-to').on('change', function () {
		var url = $(this).val();
		console.log('jump to url:');
		console.log(url);
		window.open(url);
	});


}