$( function () {

	console.log(listing_details);

	if (listing_details && listing_details.id && listing_details.type) {

		getListingDetails(listing_details.id, listing_details.type, function (data) {
			console.log(data);
			if (data) {
				renderListingDetails(data);
			} else {
				alert('there was an error');
			}

		});
	}

});


function renderListingDetails (listing_object) {

	var basics = listing_object.listing_information;

	$('#address').html(basics.address);
	$('#city').html(basics.city);
	$('#state').html(basics.state);
	$('#zip').html(basics.zip);

}


function getListingDetails (listing_id, listing_type, success_function) {
	
	$.ajax({
		url: config.listings.details.url + '/' + listing_id + '/' + listing_type,
		type: 'GET'
	})
	.done(function (data) {
		success_function(data)
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}
