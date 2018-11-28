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
      'autoWidth'   : false
    });

}

