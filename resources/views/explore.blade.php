
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-body">
  	<div id="message-area"></div>
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
  	
  	config.zips.columns =  [ 'actions', 'watchlist', 'cap by bed', 'area', 'zip'];
  	config.zips.ajax.dataSrc = function (json) {
          var return_data = new Array();
          for( var i=0; i< json.length; i++){
            return_data.push({
              // 'date_added': formatDate(json[i].createdAt),
              'zip': json[i].details.zip,
              'area': json[i].details.place_name + ', ' + json[i].details.state_abbreviation,
              'cap by bed': formatZipCalculations(json[i]),
              'watchlist' : makeWatchListButtons(json[i]),
              'actions': config.zips.get.actions_column(json[i])
            })
          }
          return return_data;
        }

    config.zips.get.actions_column = function (zip_item) {
      var html_to_return = '';
      html_to_return += '<a type="button" class="btn btn-default" target=_blank href="/explore/' + zip_item.details.zip + '">Details</a>';
      html_to_return += makeDropDownButton('API Calls', [
        {
          'text' : 'Zip Details',
          'link' : '//gulshan.app.greyladyproject.com/api/v1/zip?zip=' + zip_item.details.zip,
        },
        {
          'text' : 'Recalculate Zip',
          'link' : '//gulshan.app.greyladyproject.com/api/v1/recalculate/zips?zip='  + zip_item.details.zip,
        },
        {
          'text' : 'Recalculate Zip Listings',
          'link' : '//gulshan.app.greyladyproject.com/api/v1/recalculate/listings?zip='  + zip_item.details.zip,
        },
        {
          'text' : 'Listing Rent Search',
          'link' : '//gulshan.app.greyladyproject.com/api/v1/listings?type=rent&zip='  + zip_item.details.zip,
        },
        {
          'text' : 'Listing Sell Search',
          'link' : '//gulshan.app.greyladyproject.com/api/v1/listings?type=sell&zip='  + zip_item.details.zip,
        },
        {
          'text' : 'Average Rent',
          'link' : '//gulshan.app.greyladyproject.com/api/v1/report?zip='  + zip_item.details.zip,
        },
        {
          'text' : 'Search Watchlists',
          'link' : '//gulshan.app.greyladyproject.com/api/v1/watchlist?zip='  + zip_item.details.zip,
        },
      ])

      return html_to_return;
    }

  </script>


  <script src="/js/zips.js"></script>

@endsection 



@section('header-scripts')



@endsection 



@section('page-title')

<h3>Explore Zip Codes</h3>

@endsection