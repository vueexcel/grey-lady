$( function () {

  //render the search form. 
  renderSearchForm('watchlists', 'get', '#watchlists-search-form');	

  //Initialize Select2 Elements
  $('.select2').select2()

  createDataTable('watchlists');

});


