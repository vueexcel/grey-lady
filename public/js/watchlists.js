$( function () {

  //render the search form. 
  renderSearchForm('watchlists', '#watchlists-search-form');	

  //Initialize Select2 Elements
  $('.select2').select2()

  createDataTable('watchlists');

});


