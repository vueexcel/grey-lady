
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-body">
    <div style="overflow: auto">

      <div id="zips-search-form"></div>
    
      <div id="zips-datatable-wrapper"></div>  

    </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@endsection


@section('footer-scripts')

  <!-- page script -->
  <script type="text/javascript">
  	
  	config.zips.columns =  [ 'actions', 'on_rent', 'on_sell', 'cap by bed', 'area', 'zip'];
  	config.zips.ajax.dataSrc = function (json) {
          var return_data = new Array();
          console.log('================');
          console.log(json);
          console.log('================');
          for( var i=0; i< json.length; i++){
            return_data.push({
              // 'date_added': formatDate(json[i].createdAt),
              'zip': json[i].details.zip,
              'area': json[i].details.place_name + ', ' + json[i].details.state_abbreviation,
              'cap by bed': formatZipCalculations(json[i]),
              'on_rent': json[i].watchlist.rent ? '<a href="https://gulshan.app.greyladyproject.com/api/v1/watchlist/'+json[i].watchlist.rent.id+'" target=_blank>Yes - '+json[i].watchlist.rent.number_of_listings+'</a>' : 'No - <a href="#" id="add-watchlist-button">Add?</a>',
              'on_sell': json[i].watchlist.sell ? '<a href="https://gulshan.app.greyladyproject.com/api/v1/watchlist/'+json[i].watchlist.sell.id+'" target=_blank>Yes  - '+json[i].watchlist.sell.number_of_listings+'</a>' : 'No - <a href="#" id="add-watchlist-button">Add?</a>',
              'actions': config.zips.get.actions_column(json[i])
            })
          }
          return return_data;
        }

  </script>
  <script src="js/zips.js"></script>

@endsection 



@section('header-scripts')



@endsection 

