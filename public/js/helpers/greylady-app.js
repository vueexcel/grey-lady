function getListingDetailsFromGreylady (listing_id, purchase_type, callback) {

	// console.log('Getting Listing Details for '+listing_id+' from Greylady.....');

	var api_url = 'https://api.greyladyproject.com/api/v1/listings/' + listing_id + '/' + purchase_type;
	var data_to_send = {};

	makeGreyLadyRequest(api_url, 'GET', data_to_send, false, function (response) {
		// console.log(response);
		callback(response);
	});
}

function getZipInformation (zip, callback) {

	// console.log('Getting Zip from Greylady.....');

	var api_url = 'https://api.greyladyproject.com/api/v1/zip?zip=' + zip;
	var data_to_send = {};

	makeGreyLadyRequest(api_url, 'GET', data_to_send, false, function (response) {
		// console.log(response);
		callback(response);
	});
}

function getUserInformation (callback) {

	var api_url = '/api/user/all';
	var data_to_send = {};

	makeGreyLadyRequest(api_url, 'GET', data_to_send, true, function (response) {
		// console.log(response);
		greylady_user_info = response.data;
		callback();
	});
}

function saveZipAsFavorite (zip, callback) {

	var api_url = '/api/favoritezips';
	var data_to_save = {
		zip_code: zip,
		zip_code_town: zip
	};


	makeGreyLadyRequest(api_url, 'POST', data_to_save, true, callback)	
}
function saveListingAsFavorite (listing_id_in_greylady, listing_address, callback) {

	var api_url = '/api/favoritelistings';
	var data_to_save = {
		listing_id: listing_id_in_greylady,
		listing_address: listing_address
	};

	makeGreyLadyRequest(api_url, 'POST', data_to_save, true, callback);	
}
function DeleteZipAsFavorite (favorite_id, callback) {

	var api_url = '/api/favoritezips/' + favorite_id;
	var data_to_save = {};

	makeGreyLadyRequest(api_url, 'DELETE', data_to_save, true, callback);	
}

function DeleteListingAsFavorite (favorite_id, callback) {

	var api_url = '/api/favoritelistings/' + favorite_id;
	var data_to_save = {};

	makeGreyLadyRequest(api_url, 'DELETE', data_to_save, true, callback);	
}

function DeleteListingAsFavoritebyGreylady (favorite_id, callback) {

	var api_url = '/api/favoritelistings/byGreylady/' + favorite_id;
	var data_to_save = {};

	makeGreyLadyRequest(api_url, 'DELETE', data_to_save, true, callback);	
}


function addListingtoGreylady (create_listing_data, callback) {

	var api_url = '/api/v1/listings';

	makeGreyLadyRequest(api_url, 'POST', create_listing_data, false, function (response) {		
		callback(response);
	});
	
}

function makeGreyLadyRequest (url, type, data, auth_required, success = false, fail = false) {

	var headers = {};

	if (!success) {
		success = function () {
			showSuccessMessage('It worked');
			console.log('It worked');
		}
	}

	if (!fail) {
		fail = function () {
			showFailMessage('It failed');
			console.log('It failed');
		}
	}

	$.ajax({
		url: url,
		type: type,
		data: data,
		headers: headers
	})
	.done(function(response) {
		success(response);
	})
	.fail(function() {
		fail();
	});
}