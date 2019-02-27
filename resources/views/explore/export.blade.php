
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-body">
  	<div id="message-area"></div>
    <div style="overflow: auto">

      <div class="hidden" id="zips-search-form"></div>
    
      <div id="zips-datatable-wrapper"></div>  

    </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@endsection


@section('footer-scripts')

  <script type="text/javascript">
  	
  	config.zips.columns =  ['5 bed cap', '4 bed cap', '3 bed cap', '2 bed cap', '1 bed cap', 'area', 'zip'];
	
	config.zips.ajax.dataSrc = function (json) {
      var return_data = new Array();
      for( var i=0; i< json.length; i++){
      	console.log(json[i]);
        return_data.push({
          'zip': '<a target=_Blank href="/explore/'+json[i].details.zip+'">' + json[i].details.zip + '</a>',
          'area': '<a target=_Blank href="/explore/?town=' + json[i].details.place_name + '&stateAbbreviation=' + json[i].details.state_abbreviation + '" >' + json[i].details.place_name + ', ' + json[i].details.state_abbreviation + '</a>',
          '5 bed cap' : returnCapforBed(json[i], 5),
          '4 bed cap' : returnCapforBed(json[i], 4),
          '3 bed cap' : returnCapforBed(json[i], 3),
          '2 bed cap' : returnCapforBed(json[i], 2),
          '1 bed cap' : returnCapforBed(json[i], 1),
          // 'cap by bed': formatZipCalculations(json[i]),
        })
      }
      return return_data;
    }

	//render the search form. 
	renderSearchForm('zips', 'get', '#zips-search-form');	

	createDataTable('zips');


  </script>

@endsection 



@section('header-scripts')



@endsection 



@section('page-title')

<h3>Explore Zip Codes</h3>

@endsection