function formatDate (date_to_format) {

	return moment(date_to_format.replace(/T/, ' ').replace(/\..+/, ''), '').fromNow()

}