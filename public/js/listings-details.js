$( function () {

	// console.log(listing_details);

	if (listing_details && listing_details.id && listing_details.type) {

		getListingDetails(listing_details.id, listing_details.type, function (data) {
			// console.log(data);
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
	var calcs = listing_object.calculated_fields[0];

	$('#address').html(basics.address);
	$('#city').html(basics.city);
	$('#state').html(basics.state);
	$('#zip').html(basics.zip);
	

	//add basic information to the page. 
	var basic_information_html = '';
	basic_information_html += '<span>Price: ' + basics.price + '</span>';
	basic_information_html += '<span>Beds: ' + basics.minBeds + '</span>';
	basic_information_html += '<span>Baths: ' + basics.baths + '</span>';
	basic_information_html += '<span>Sqft: ' + basics.area + '</span>';
	basic_information_html += '<span>Created on: ' + formatDate(basics.createdAt) + '</span>';

	$('#basic-information').html(basic_information_html);

	//add financial information to the page. 
	var financial = calcs.financial_information;
	var financial_info_html = '';
	financial_info_html += '<span><b>Cap Rate:</b> ' + formatPercentage(financial.cap_rate) + '</span>';
	financial_info_html += '<span><b>Cash on Cash:</b> ' + formatPercentage(financial.cash_on_cash) + '</span>';
	financial_info_html += '<span><b>Debt Coverage:</b> ' + formatPercentage(financial.debt_coverage_ratio) + '</span>';
	financial_info_html += '<span><b>Rent to Value:</b> ' + formatPercentage(financial.rent_to_value) + '</span>';

	$('#financial-info').html(financial_info_html);

	// Mortgage Information
	var mortgage = calcs.mortgage_information;
	var mortgage_info_html = '';
	mortgage_info_html += '<span><b>Total Price:</b> ' + accounting.formatMoney(mortgage.price, "$", 0) + '</span>';
	mortgage_info_html += '<span><b>Downpayment:</b> ' + accounting.formatMoney(mortgage.downpayment, "$", 0) + '</span>';
	mortgage_info_html += '<span><b>Loan Amount:</b> ' + accounting.formatMoney(mortgage.loan_amount, "$", 0) + '</span>';
	mortgage_info_html	 += '<span><b>Monthly Payment:</b> ' + accounting.formatMoney(mortgage.monthly.Payment, "$", 0) + '</span>';

	$('#mortgage-info').html(mortgage_info_html);


	// Operating P&L
	var pnl = calcs.operating_profit_and_loss.monthly;
	var pnl_info_html = '';
	pnl_info_html += '<span><b>Revenue:</b> ' + accounting.formatMoney(pnl.revenue, "$", 0) + '</span>';
	pnl_info_html += '<span><b>Lost to vacancy:</b> ' + accounting.formatMoney(pnl.loss_to_vacancy, "$", 0) + '</span>';
	pnl_info_html += '<span><b>Operating Income:</b> ' + accounting.formatMoney(pnl.operating_income, "$", 0) + '</span>';
	pnl_info_html += '<span><b>Operating Expenses:</b> ' + accounting.formatMoney(pnl.operating_expenses, "$", 0) + '</span>';
	pnl_info_html += '<span><b>Net Operating Income:</b> ' + accounting.formatMoney(pnl.net_operating_income, "$", 0) + '</span>';
	pnl_info_html += '<span><b>Mortgage payment:</b> ' + accounting.formatMoney(pnl.mortgage_payment, "$", 0) + '</span>';
	pnl_info_html += '<span><b>Cash profit:</b> ' + accounting.formatMoney(pnl.cash_profit, "$", 0) + '</span>';
	

	$('#operating-pl').html(pnl_info_html);

	



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
