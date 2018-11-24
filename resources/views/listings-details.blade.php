
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
            <div class="box-body" id="financial-information"></div>
          </div>
    

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Basic</a></li>
              <li><a href="#tab_2" data-toggle="tab">Location</a></li>
              <li><a href="#tab_3" data-toggle="tab">Unit</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div id="listing-information-basic"></div>
              </div>

              <div class="tab-pane active" id="tab_2">
                <div id="listing-information-location"></div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <div id="listing-information-units"></div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
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

  

@endsection 