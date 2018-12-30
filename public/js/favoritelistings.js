$( function () {

	if (favorite_listing_ids) {
		createDataTable('favoritelistings');
	} else {
		$('#favoritelistings-datatable-wrapper').html('No favorites... go favorite something');
	}

  

});


