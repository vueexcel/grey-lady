if (window.location.search.indexOf('modal') > -1) {

	$('#myModal').modal('show');


	$('#start-tour').on('click', function () {

		$('#myModal').modal('hide');
		introJs().start();

	});


}



  