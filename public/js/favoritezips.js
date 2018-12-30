$( function () {

	if (favorite_zip_ids) {
		createDataTable('favoritezips');		
	} else {
		$('#favoritezips-datatable-wrapper').html('No favorites... go favorite something');
	}
  

});


