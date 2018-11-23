function formatDate (date_to_format) {

	if (date_to_format) {
		return moment(date_to_format.replace(/T/, ' ').replace(/\..+/, ''), '').fromNow()	
	} else {
		return 'n/a';
	}

}

function formatPercentage(number_to_format) {
	return " " + (Number(Math.round((number_to_format * 100)+'e3')+'e-3')) + "%";

}