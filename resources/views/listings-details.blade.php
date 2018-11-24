
@extends('layouts.app')


@section('content')

          <!-- Title -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">
                <a href="/listings">Listings</a> > Details for 
                <span id="address"></span> 
                <span id="city"></span>, 
                <span id="state"></span> 
                <span id="zip"></span>
              </h3>
            </div>
            <div class="box-body" id="basic-information"></div>
          </div>
    
          <div class=col-md-4>

            <div class="box box-solid">
              <div class="box-header with-border">Financial Info</div>
              <div class="box-body" id="financial-info"></div>
            </div>
          
          </div>
          <div class=col-md-4>
          
            <div class="box box-solid">
              <div class="box-header with-border">Mortgage Info</div>
              <div class="box-body" id="mortgage-info"></div>
            </div>

          </div>
          <div class=col-md-4>

            <div class="box box-solid">
              <div class="box-header with-border">Operating P&L</div>
              <div class="box-body" id="operating-pl"></div>
            </div>
          
          </div>

          


@endsection


@section('footer-scripts')


  <script type="text/javascript">
    var listing_details = {}
    listing_details.id ='{{ app('request')->input('id') }}';
    listing_details.type = '{{ app('request')->input('type') }}';
    console.log(listing_details);
  </script>

  <!-- page script -->
  <script src="/js/listings-details.js"></script>

@endsection 



@section('header-scripts')

  <link rel="stylesheet" href="/css/listings-details.css">
  

@endsection 