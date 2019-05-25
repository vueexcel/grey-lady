$('#myModal').modal('show');


$('#start-tour').on('click', function () {

	$('#myModal').modal('hide');
	introJs().start();

});

  