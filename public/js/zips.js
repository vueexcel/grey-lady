$( function () {

  //render the search form. 
  renderSearchForm('zips', 'get', '#zips-search-form');	

  //Initialize Select2 Elements
  $('.select2').select2()

  createDataTable('zips');

});


