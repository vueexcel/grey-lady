function createDataTable (config_item) {

	var columns_for_datatable = [];

	for (var i = config[config_item].columns.length - 1; i >= 0; i--) {
		columns_for_datatable.push({'data': config[config_item].columns[i]});
	}	
	

	var datatable_html = '';
	datatable_html += '<table id="'+config[config_item].get.datatable_id+'" class="table table-bordered table-striped">';


	datatable_html += '<thead>';
	datatable_html += '<tr>';
	for (var i = config[config_item].columns.length - 1; i >= 0; i--) {
		datatable_html += '<th>' + config[config_item].columns[i] + '</th>';
	}
	datatable_html += '</tr>';
	datatable_html += '</thead>';
	


	datatable_html += '<tbody>';
	datatable_html += '<tr>';
	for (var i = config[config_item].columns.length - 1; i >= 0; i--) {
		datatable_html += '<td>' + config[config_item].columns[i] + '</td>';
	}
	datatable_html += '</tr>';
	datatable_html += '</tbody>';
	datatable_html += '</table>';

	$('#' + config[config_item].get.datatable_id + '-wrapper').html(datatable_html);


	var columns_defs = false;
	if (config[config_item].get.columns_defs) {
		columns_defs = config[config_item].get.columns_defs;
		// alert(columns_defs);

	}


	config[config_item].get.datatable = $('#' + config[config_item].get.datatable_id).DataTable({
      // 'serverSide'	: true,
      'ajax'        : config[config_item].ajax,
      'columns'    : columns_for_datatable,
      'columnsDefs'    : columns_defs,
      'fixedColumns'    : true,
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'scrollCollapse' : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      'pageLength'   : 100
    });

}

function formatZipCalculations(zip_item) {

	var html_to_return = '';

	// console.log(zip_item);

	if (zip_item && zip_item.calculated_fields && zip_item.calculated_fields.by_beds) {
		for (beds in zip_item.calculated_fields.by_beds) {
			html_to_return +=  '<div class="precentage">';				
			html_to_return +=  '<span class="precentage-top">' + formatPercentage(zip_item.calculated_fields.by_beds[beds].average_cap_rate,1) + '</span>';				
			html_to_return +=  '<span class="precentage-bottom">' + beds + 'b</span>';				
			html_to_return +=  '</div>';				
		}
	} else {
		html_to_return +=  '<a href="#" id="recalculate-zip" data-zip="'+zip_item.details.zip+'">';
		html_to_return +=  'No Listing Data - recalculate?';				
		html_to_return +=  '</a>';				
	}

	$('#zips-datatable').off().on('click', '#recalculate-zip', function (event) {
		var click_data = $(this).data(click_data);
		$.get('//gulshan.app.greyladyproject.com/api/v1/recalculate/zips?zip=' + click_data.zip, function(data) {
			showAlertMessage(false, 'Success', data);
			$('#zips-datatable').DataTable().ajax.reload(null, false);
		});
		event.preventDefault();
	});

	return html_to_return;
}

function showAlertMessage (tpye_of_message, message_title, message_text) {
	var html_to_return = '';
	html_to_return += '<div class="alert alert-success alert-dismissible">';
	html_to_return += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
	html_to_return += '<h4><i class="icon fa fa-check"></i>'+message_title+'</h4>';
	html_to_return += message_text;
	html_to_return += '</div>';
	$('#message-area').append(html_to_return).fadeOut('5000');
}

function makeWatchListButtons (zip_item) {
	var html_to_return = '';

	html_to_return += '<div class="watchlist-rent-wrapper">';
	
	if (zip_item.watchlist.rent) {
		html_to_return += '<p><b>Rent</b> <span> - '+formatDate(zip_item.watchlist.rent.lastCrawl);
		html_to_return += ', ' + zip_item.watchlist.rent.number_of_listings + ' listings';
		html_to_return += '<a href="#" id="add-watchlist-button" data-type="rent" data-zip="'+zip_item.details.zip+'" data-nextRun="true" data-new="false" data-id="'+zip_item.watchlist.rent.id+'"> (download)</a>';
	} else {
		html_to_return += '<p><b>Rent</b><span> - never';
		html_to_return += '<a href="#" id="add-watchlist-button" data-type="rent" data-zip="'+zip_item.details.zip+'" data-nextRun="true" data-new="true"> (download)</a>';
	}
	
	html_to_return += '</span></p>';
	html_to_return += '</div>';

	html_to_return += '<div class="watchlist-sell-wrapper">';
	if (zip_item.watchlist.sell) {
		html_to_return += '<p><b>Sell</b> <span> - '+formatDate(zip_item.watchlist.sell.lastCrawl);
		html_to_return += ', ' + zip_item.watchlist.sell.number_of_listings + ' listings';
		html_to_return += '<a href="#" id="add-watchlist-button" data-type="sell" data-zip="'+zip_item.details.zip+'" data-nextRun="true" data-new="false" data-id="'+zip_item.watchlist.sell.id+'"> (download)</a>';
	} else {
		html_to_return += '<p><b>Sell</b> <span> - never';
		html_to_return += '<a href="#" id="add-watchlist-button" data-type="sell" data-zip="'+zip_item.details.zip+'" data-nextRun="true" data-new="true"> (download)</a>';
	}
	
	html_to_return += '</span></p>';
	html_to_return += '</div>';

	$('#zips-datatable').off().on('click', '#add-watchlist-button', function (event) {
		var watchlist_data = $(this).data(watchlist_data);
		var request_type = 'POST';

		var request_data = '';
		request_data += 'zip=' + watchlist_data.zip;
		request_data += '&nextRun=' + watchlist_data.nextrun;
		request_data += '&type=' + watchlist_data.type;
		
		if (!watchlist_data.new) {
			request_type = 'PUT';
			request_data += '&id=' + watchlist_data.id;
		} 
		
		console.log(request_data);

		$.ajax({
			url: 'https://gulshan.app.greyladyproject.com/api/v1/watchlist',
			type: request_type,
			data: request_data,
		})
		.done(function(data) {
			console.log(data);
			showAlertMessage(false, 'Success', data);
			$('#zips-datatable').DataTable().ajax.reload(null, false);
		});
		
		event.preventDefault();
	});

	return html_to_return;

}



