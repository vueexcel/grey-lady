function showSuccessMessage (header) {
	$('#message-area').html('<div class="callout callout-success"><p>'+header+'</p></div>').delay(500).fadeOut('slow');
}

function showFailMessage (header) {
	$('#message-area').html('<div class="callout callout-fail"><p>'+header+'</p></div>').delay(500).fadeOut('slow');
}
function formatPercentage(number_to_format) {
	// return " " + (Number(Math.round((number_to_format * 100)+'e3')+'e-3')) + "%";
	return " " + numeral(number_to_format).format('0.0%');
}
function formatCurrency(value, digits = 0) {
	return '$' + abbreviateNumber(value, digits);
}
function abbreviateCurrency(value, digits = 0) {
	return '$' + abbreviateNumber(value, digits);
}
function abbreviateNumber(value, digits = 0) {
    
    if (digits == 0) {
    	return numeral(value).format('0a');	
    } else {
		return numeral(value).format('0.0a');	
    }
}
function convertSquareFeetToAcres (square_feet) {
	var acres = numeral(square_feet).value() * 0.000023;
	return numeral(acres).format('0.00');
}

