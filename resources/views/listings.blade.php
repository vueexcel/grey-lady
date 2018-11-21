
@extends('layouts.app')


@section('content')


<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Listings</h3>
  </div>
  <div class="box-body">
    
    <div style="overflow: auto">

      <div class="form-group">
          <label style="margin-left: 10px">Zip</label>
          <select class="form-control select2" style="width: 100px;">
            <option>02108</option>
            <option>etc..</option>
          </select>
          <label style="margin-left: 10px">Purchase Type</label>
          <select class="form-control select2" style="width: 100px;">
            <option>Buy</option>
            <option>Rent</option>
          </select>
          <label style="margin-left: 10px">Price Min</label>
          <select class="form-control select2" style="width: 100px;">
            <option>100,000</option>
            <option>150,000</option>
            <option>200,000</option>
          </select>
          <label style="margin-left: 10px">Price Max</label>
          <select class="form-control select2" style="width: 100px;">
            <option>150,000</option>
            <option>200,000</option>
            <option>250,000</option>
          </select>
          <label style="margin-left: 10px">Beds Min</label>
          <select class="form-control select2" style="width: 100px;">
            <option>1</option>
            <option>2</option>
            <option>3</option>
          </select>
          <label style="margin-left: 10px">Beds Max</label>
          <select class="form-control select2" style="width: 100px;">
            <option>1</option>
            <option>2</option>
            <option>3</option>
          </select>
      </div>
      
    
      <table id="listing-datatable" class="table table-bordered table-striped">
          <!-- Date downloaded, Website downloaded from, link to first image, Address, For Rent/For Sale, Property Type, MLS Number, City, Zip, Beds, Baths, Sale Price / Monthly Rent, Sqft, Price per sqft, HOA Dues, Link to details page -->

          <thead>
          <tr>
            <th>Date Downloaded</th>
            <th>Address</th>
            <th>Sqft</th>
            <th>Beds</th>
            <th>Baths</th>
            <th>Price</th>
            <th>Zip</th>
            <th>Link</th>
          </tr>
          </thead>




          <tbody>
            <tr>
              <td>test</td>
              <td>test</td>
              <td>test</td>
              <td>test</td>
              <td>test</td>
              <td>test</td>
              <td>test</td>
              <td>test</td>
            </tr>


                              
          </tbody>
        </table>
      </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

@endsection


@section('content-scripts')

<!-- page script -->
<script>
  $(function () {

    //Initialize Select2 Elements
    $('.select2').select2()

    $('#listing-datatable').DataTable({
        'ajax'        : {
        'url': "https://gulshan.app.greyladyproject.com/api/v1/listings?zip=01603&type=sell&minBed=3&maxBed=3",
        'dataSrc'     : function (json) {
          var return_data = new Array();
          for( var i=0; i< json.items.length; i++){
            return_data.push({
              'date_added': moment().format(json.items[i].listing_information.createdAt),
              'address': json.items[i].listing_information.address,
              'sqft': json.items[i].listing_information.area,
              'beds': json.items[i].listing_information.maxBed,
              'baths': json.items[i].listing_information.baths,
              'price': json.items[i].listing_information.price,
              'zip': json.items[i].listing_information.zip,
              'link': '<a href="http://trulia.com' + json.items[i].listing_information.link + '">Link</a>'
            })
          }
          return return_data;

        }
      },
      'columns'    : [
        {'data': 'date_added'},
        {'data': 'address'},
        {'data': 'sqft'},
        {'data': 'beds'},
        {'data': 'baths'},
        {'data': 'price'},
        {'data': 'zip'},
        {'data': 'link'}
      ],
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'scrollCollapse' : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    });
  })
</script>

@endsection 