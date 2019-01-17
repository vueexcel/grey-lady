
@extends('layouts.app')


@section('content')

<div id="message-area"></div>

<div class="col-md-8 explore-details">

  @include('explore.zip-summary')

  @include('general.listing-datatable')

  @include('explore.top-listings')

</div>


<div class=" col-md-4">
  
  @include('explore.actions')

  @include('explore.header-watchlist')

  @include('explore.housing')

  @include('explore.income')

  @include('explore.education')

  @include('explore.watchlist')

</div>



<div class="col-md-12 row"> 

  @include('general.dump-response')

</div>




@endsection


@section('footer-scripts')

  <!-- page script -->
  <script type="text/javascript">
    var explore_details_zip = '{{$zip[0]->details->zip}}';
  </script>
  <script src="/js/listings.js"></script>
  <script src="/js/explore-details.js"></script>

@endsection 



@section('header-scripts')

  


@endsection 



@section('page-title')

  <div class="explore-details-header">
    <h3><span>Explore > {{ $zip[0]->details->zip }}</span></h3>
    {{-- <span class="city-and-state">({{ $zip[0]->details->place_name }}, {{ $zip[0]->details->state_abbreviation }})</span> --}}
    <div class="navbar-custom-menu">
        
        @include('explore.explore-cap-calc')

    </div>
  </div>


@endsection