$( function () {

  //render the search form. 
  renderSearchForm('listings', 'get', '#listings-search-form');	

  //Initialize Select2 Elements
  $('.select2').select2()

  createDataTable('listings');

});


